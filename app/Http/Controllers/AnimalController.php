<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    public function index(Farm $farm)
    {
        $user = Auth::user();
        $farmId = $user->farm_id;
        if($farmId === null)
            return view('users.login');

        $animals = Animal::where('farm_id', $farmId)->get();
        return view('animals.index', compact('animals'));
    }

    public function show(Animal $animal)
    {
        $farm = $animal->farm;
        return view('animals.show', compact('animal','farm'));
    }

    public function create(Farm $farm)
    {
        return view('animals.create', compact('farm'));
    }

    public function store(Request $request,Farm $farm)
    {
        $user = Auth::user();
        $farmId = $user->farm_id;

        $request->validate([
            'name' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'type' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric',
        ]);

        $animal = new Animal($request->all());
        $animal->farm_id = $farmId;
        $animal->save();

        return redirect()->route('animals.index')->with('success', 'Animal registered successfully.');
    }

    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }

    public function update(Request $request,Animal $animal)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'type' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'weight' => 'nullable|numeric',
        ]);

        $animal->update($request->all());

        return redirect()->route('animals.index',[$animal->farm])->with('success', 'Animal updated successfully.');
    }

    public function destroy(Animal $animal)
    {
        $farm = $animal->farm;
        $animal->delete();
        return redirect()->route('animals.index',[$farm])->with('success', 'Animal deleted successfully.');
    }
}

