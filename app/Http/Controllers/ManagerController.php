<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ManagerController extends Controller
{
    public function index()
    {
        $loggedInUserId = Auth::id();
        $loggedInUserFarmId = User::find($loggedInUserId)->farm_id;

        $managers = User::whereHas('roles', function ($query) {
            $query->where('role_name', 'manager');
        })->where('farm_id', $loggedInUserFarmId)->get();

        return view('managers.index', compact('managers'));
    }

    public function create()
    {
        return view('managers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|string|email',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string',
        ]);

        $farmId = Auth::user()->farm_id;;

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'farm_id' => $farmId,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
        ]);

        $role = Role::create([
            'farm_id' => $farmId,
            'user_id' => $user->id,
            'role_name' => 'manager',
            'description' => null,
        ]);

        return redirect('/managers')->with('success', 'Manager\'s Account created successfully.');
    }

    public function edit($id)
    {
        $manager = User::findOrFail($id);
        return view('managers.edit', compact('manager'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|string|email',
            'password' => 'nullable|string|min:8|confirmed',
            'phone_number' => 'required|string',
        ]);

        $user = User::find($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->phone_number = $request->phone_number;

        $user->save();

        return redirect('/managers')->with('success', 'Manager\'s Account updated successfully.');
    }

}
