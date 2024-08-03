<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\FeedIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedIngredientController extends Controller
{
    public function index(Farm $farm)
    {
        $user = Auth::user();
        $farmId = $user->farm_id;

        $feedIngredients = FeedIngredient::where('farm_id', $farmId)->get();
        return view('feed_ingredients.index', compact('feedIngredients'));
    }

    public function create(Farm $farm)
    {
        return view('feed_ingredients.create', compact('farm'));
    }

    public function store(Request $request, Farm $farm)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $user = Auth::user();
        $farmId = $user->farm_id;

        $feedIngredient = new FeedIngredient($request->all());
        $feedIngredient->farm_id = $farmId;
        $feedIngredient->save();

        return redirect()->route('feed_ingredients.index')->with('success', 'Feed ingredient created successfully.');
    }

    public function edit(FeedIngredient $feedIngredient)
    {
        return view('feed_ingredients.edit', compact('feedIngredient'));
    }

    public function update(Request $request, FeedIngredient $feedIngredient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $feedIngredient->update($request->all());

        return redirect()->route('feed_ingredients.index', [$feedIngredient->farm])->with('success', 'Feed ingredient updated successfully.');
    }

    public function destroy(FeedIngredient $feedIngredient)
    {
        $farm = $feedIngredient->farm;
        $feedIngredient->delete();
        return redirect()->route('feed_ingredients.index', [$farm])->with('success', 'Feed ingredient deleted successfully.');
    }
}
