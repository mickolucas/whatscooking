<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Http;

class MealController extends Controller
{
    public function index(): View
    {
        $ingredients = Ingredient::all();
        return view('meal', compact('ingredients'));
    }

    public function fetchRecipes(): JsonResponse
    {
        $client = new Client(['verify' => false]);

        $ingredients = Ingredient::pluck('name')->toArray();

        if (empty($ingredients)) {
            return response()->json(['error' => 'No ingredients found'], 400);
        }

        $allMeals = [];
        $mealIds = [];

        try {
            foreach ($ingredients as $ingredient) {
                $apiUrl = "https://www.themealdb.com/api/json/v1/1/filter.php?i=" . urlencode($ingredient);
                Log::info("Fetching meals from: " . $apiUrl);

                $response = $client->get($apiUrl);
                $data = json_decode($response->getBody()->getContents(), true);

                Log::info("API Response: " . json_encode($data));

                if (!empty($data['meals'])) {
                    foreach ($data['meals'] as $meal) {
                        if (!in_array($meal['idMeal'], $mealIds)) {
                            $mealIds[] = $meal['idMeal'];
                        }
                    }
                }
            }

            foreach (array_slice($mealIds, 0, 6) as $mealId) {
                $detailUrl = "https://www.themealdb.com/api/json/v1/1/lookup.php?i=" . $mealId;
                Log::info("Fetching full details from: " . $detailUrl);

                $detailResponse = $client->get($detailUrl);
                $mealDetails = json_decode($detailResponse->getBody()->getContents(), true);

                Log::info("Meal Details Response: " . json_encode($mealDetails));

                if (!empty($mealDetails['meals'])) {
                    $allMeals[] = $mealDetails['meals'][0];
                }
            }

            Log::info("Final Meals Data: " . json_encode($allMeals));
            return response()->json(['meals' => $allMeals]);

        } catch (\Exception $e) {
            Log::error("API Fetch Error: " . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch meals'], 500);
        }
    }

    // ✅ Gemini AI Ingredient Substitutions
    public function suggestSubstitutes(Request $request)
    {
        $ingredient = $request->input('ingredient');

        if (!$ingredient) {
            return response()->json(['error' => 'No ingredient provided'], 400);
        }

        $prompt = "Give me 3 good substitutes for $ingredient in cooking and why they work.";

        $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent", [
            'key' => config('services.gemini.api_key'),
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ]
        ]);

        $data = $response->json();

        return response()->json([
            'substitutes' => $data['candidates'][0]['content']['parts'][0]['text'] ?? 'No suggestions found'
        ]);
    }

    // ✅ Gemini AI Cooking Assistant (Fix: Removed extra `]`)
    public function aiCookingAssistant(Request $request)
    {
        $meal = $request->input('meal');

        if (!$meal) {
            return response()->json(['error' => 'No meal provided'], 400);
        }

        $prompt = "Explain step-by-step how to cook $meal in a clear and easy-to-follow manner.";

        $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent", [
            'key' => config('services.gemini.api_key'),
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ]
        ]);

        $data = $response->json();

        return response()->json([
            'instructions' => $data['candidates'][0]['content']['parts'][0]['text'] ?? 'No instructions found'
        ]);
    }
}
