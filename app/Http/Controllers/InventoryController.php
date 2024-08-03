<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Models\FeedIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryItemController extends Controller
{
    // public function index(FeedIngredient $feedIngredient)
    // {
    //     $inventoryItems = InventoryItem::where('feedIngredient_id', $feedIngredient->id)->get();

    //     return view('inventory_items.index', compact('inventoryItems'));
    // }

    // public function create(Farm $farm)
    // {
    //     // You may implement a form to create inventory items here
    // }

    // public function store(Request $request, Farm $farm)
    // {
    //     // You may implement storing logic for inventory items here
    // }

    // public function edit(InventoryItem $inventoryItem)
    // {
    //     // You may implement a form to edit inventory items here
    // }

    // public function update(Request $request, InventoryItem $inventoryItem)
    // {
    //     // You may implement updating logic for inventory items here
    // }

    // public function destroy(InventoryItem $inventoryItem)
    // {
    //     // You may implement deletion logic for inventory items here
    // }
}
