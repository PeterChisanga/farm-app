<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Farm;
use App\Models\Role;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    public function index()
    {
        $farms = Farm::all();

        return view('farms.index', compact('farms'));
    }

    public function create()
    {
        return view('farms.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'size' => 'required|numeric|min:0',
        ]);

        $userId = Auth::id();

        $farmData = $request->all();
        $farmData['owner_id'] =  $userId;

        $farm = Farm::create($farmData);

        $user = User::find($userId);
        $user->farm_id = $farm->id;
        $user->save();

        Role::create([
            'farm_id' => $farm->id,
            'user_id' => $userId,
            'role_name' => 'owner',
            'description' => 'Farm owner',
        ]);

        return redirect()->route('dashboard.index')
            ->with('success', 'Farm Registered successfully!');
    }


    public function show(Farm $farm)
    {
        $farm->load('fields', 'users');

        return view('farms.show', compact('farm'));
    }

    public function edit(Farm $farm)
    {
        return view('farms.edit', compact('farm'));
    }

    public function update(Request $request, Farm $farm)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'size' => 'required|numeric|min:0',
        ]);

        $farm->update($request->all());

        return redirect()->route('farms.show', $farm->id)
            ->with('success', 'Farm updated successfully!');
    }

    public function destroy(Farm $farm)
    {
        return redirect()->route('farms.index')
                        ->with('success', 'Farm deleted successfully!');
    }
}
