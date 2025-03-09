<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('meal', compact('ingredients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ingredients' => 'required|array|min:1',
            'ingredients.*' => 'string|max:255'
        ]);

        foreach ($request->ingredients as $ingredient) {
            Ingredient::create(['name' => $ingredient]);
        }

        return redirect()->route('meal.index')->with('success', 'Ingredients saved successfully!');
    }

    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();

        return redirect()->route('meal.index')->with('success', 'Ingredient deleted successfully!');
    }
}
