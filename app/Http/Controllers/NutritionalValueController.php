<?php

namespace App\Http\Controllers;

use App\Models\NutritionalValue;
use App\Models\FeedIngredient;
use Illuminate\Http\Request;

class NutritionalValueController extends Controller
{
    public function index(FeedIngredient $feedIngredient)
    {
        $nutritionalValue = $feedIngredient->nutritionalValue;
        return view('nutritional_values.index', compact('nutritionalValue'));
    }

    public function create(FeedIngredient $feedIngredient)
    {
        return view('nutritional_values.create', compact('feedIngredient'));
    }

    public function store(Request $request, FeedIngredient $feedIngredient)
    {
        $request->validate([
            'protein_content' => 'required|numeric',
            'fiber_content' => 'required|numeric',
            'calcium_content' => 'required|numeric',
            'fat_content' => 'required|numeric',
        ]);

        $nutritionalValue = new NutritionalValue($request->all());
        $nutritionalValue->feed_ingredient_id = $feedIngredient->id;
        $nutritionalValue->save();

        return redirect()->route('feed_ingredients.show', [$feedIngredient])->with('success', 'Nutritional value registered successfully');
    }

    public function edit(NutritionalValue $nutritionalValue)
    {
        return view('nutritional_values.edit', compact('nutritionalValue'));
    }

    public function update(Request $request, NutritionalValue $nutritionalValue)
    {
        $request->validate([
            'protein_content' => 'required|numeric',
            'fiber_content' => 'required|numeric',
            'calcium_content' => 'required|numeric',
            'fat_content' => 'required|numeric',
        ]);

        $nutritionalValue->update($request->all());

        return redirect()->route('feed_ingredients.show', [$nutritionalValue->feedIngredient])->with('success', 'Nutritional value updated successfully');
    }

    public function destroy(NutritionalValue $nutritionalValue)
    {
        $feedIngredient = $nutritionalValue->feedIngredient;
        $nutritionalValue->delete();

        return redirect()->route('feed_ingredients.show', [$feedIngredient])->with('success', 'Nutritional value deleted successfully');
    }
}
