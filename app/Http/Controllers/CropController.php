<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CropController extends Controller
{
    public function index(Field $field)
    {
        $crops = $field->crops();
        return view('crops.index', compact('crops'));
    }

    public function create(Field $field)
    {
        return view('crops.create' ,compact('field'));
    }

    public function store(Request $request,Field $field)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'variety' => 'required|string|max:255',
            'planting_date' => 'required|date',
            'expected_yield' => 'required|numeric',
        ]);

        $crop = new Crop($request->all());
        $crop->field_id = $field->id;
        $crop->save();

        return redirect()->route('fields.index',[$field])->with('success', 'crop registered successfully.');
    }

    public function show(Crop $crop)
    {
        $farm = $crop->farm;
       return view('crops.show', compact('crop','farm'));
    }

    public function edit(Crop $crop)
    {
        return view('crops.edit', compact('crop'));
    }

    public function update(Request $request, Crop $crop)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'variety' => 'required|string|max:255',
            'planting_date' => 'required|date',
            'expected_yield' => 'required|numeric',
            'field_id' => 'required|integer|exists:fields,id',
        ]);

        $crop = Crop::findOrFail($crop);
        $crop->update($request->all());

        return redirect()->route('crops.index',[$crop->field])->with('success', 'crop updated successfully.');
    }

    public function destroy(Crop $crop)
    {
        $field = $crop->field;
        $crop->delete();
        return redirect()->route('crops.index',[$field])->with('success', 'crop deleted successfully');
    }
}
