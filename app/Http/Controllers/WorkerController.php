<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $farmId = $user->farm_id;

        $workers = Worker::where('farm_id', $farmId)->get();
        return view('workers.index', compact('workers'));
    }

    public function create(Farm $farm)
    {
        return view('workers.create', compact('farm'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $farmId = $user->farm_id;

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'salary' => 'nullable|numeric',
        ]);

        $worker = new Worker($request->all());
        $worker->farm_id = $farmId;
        $worker->save();

        return redirect()->route('workers.index')->with('success', 'Worker registered successfully.');
    }

    public function edit(Worker $worker)
    {
        return view('workers.edit', compact('worker'));
    }

    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'salary' => 'nullable|numeric',
        ]);

        $worker->update($request->all());

        return redirect()->route('workers.index')->with('success', 'Worker updated successfully.');
    }

    public function destroy(Worker $worker)
    {
        $farm = $worker->farm;
        $worker->delete();
        return redirect()->route('workers.index', [$farm])->with('success', 'Worker deleted successfully.');
    }
}
