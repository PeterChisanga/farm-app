<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FieldController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $farmId = $user->farm_id;
        $fields = Field::where('farm_id', $farmId)->get();
        return view('fields.index', compact('fields'));
    }

    public function create()
    {
        return view('fields.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|numeric',
        ]);

        $user = Auth::user();
        $farmId = $user->farm_id;

        $field = new Field($request->all());
        $field->farm_id = $farmId;
        $field->save();

        return redirect()->route('fields.index')->with('success', 'Field created successfully.');
    }

    public function edit(Field $field)
    {
        return view('fields.edit', compact('field'));
    }

    public function update(Request $request, Field $field)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|numeric',
        ]);

        $field->update($request->all());

        return redirect()->route('fields.index')->with('success', 'Field updated successfully.');
    }

    public function destroy(Field $field)
    {
        $farm = $field->farm;
        $field->delete();
        return redirect()->route('fields.index', [$farm])->with('success', 'Field deleted successfully.');
    }
}
