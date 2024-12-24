<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InventoryController extends Controller
{
    public function index()
    {
        // Get Item From DB
        $items = Item::all();

        return view('inventory.home', ['items' => $items]);
    }

    public function addItem()
    {
        return view('inventory.add_item');
    }

    public function editItem($id)
    {
        $item = Item::findOrFail($id);

        if (!$item) {
            return redirect()->back();
        }

        return view('inventory.edit_item', ['item' => $item]);
    }

    public function storeItem(Request $req)
    {
        // Data Validation
        $data_validation = $req->validate([
            "name" => "required|string|max:255",
            "price" => "required|integer|min:1",
            "stock" => "required|integer|min:1"
        ], [
            "name.required" => "Name is required",
            "name.string" => "Name must be a string",
            "name.max" => "Name must not exceed 255 characters",
            "price.required" => "Price is required",
            "price.integer" => "Price must be an integer",
            "price.min" => "Price must be at least 1",
            "stock.required" => "Stock is required",
            "stock.integer" => "Stock must be an integer",
            "stock.min" => "Stock must be at least 1 unit"
        ]);

        $data = Item::create($data_validation);

        if (!$data) {
            // Show Error Alert
            Alert::error("Error", "Add item failed");

            return redirect()->back();
        }

        // Show Alert
        Alert::success("Success", "Add item successfully");

        return redirect("/home");
    }

    public function updateItem(Request $req)
    {
        // Data Validation
        $data_validation = $req->validate([
            "id" => "required|exists:items,id",
            "name" => "required|string|max:255",
            "price" => "required|integer|min:1",
            "stock" => "required|integer|min:1"
        ], [
            "id.required" => "ID is required",
            "id.exists" => "The selected ID does not exist in inventories",
            "name.required" => "Name is required",
            "name.string" => "Name must be a string",
            "name.max" => "Name must not exceed 255 characters",
            "price.required" => "Price is required",
            "price.integer" => "Price must be an integer",
            "price.min" => "Price must be at least 1",
            "stock.required" => "Stock is required",
            "stock.integer" => "Stock must be an integer",
            "stock.min" => "Stock must be at least 1 unit"
        ]);

        $data = Item::findOrFail($data_validation["id"]);

        if (!$data) {
            return redirect()->back();
        }

        $data->name = $data_validation["name"];
        $data->price = $data_validation["price"];
        $data->stock = $data_validation["stock"];

        if (!$data->save()) {
            // Show Error Alert
            Alert::error("Error", "Update item failed");

            return redirect()->back();
        } else {
            // Show Alert
            Alert::info("Success", "Update item successfully");

            return redirect("/home");
        }
    }

    public function deleteItem($id)
    {
        $data = Item::findOrFail($id);

        if (!$data) {
            return redirect()->back();
        }

        if (!$data->delete()) {
            // Show Error Alert
            Alert::error("Error", "Delete item failed");

            return redirect()->back();
        } else {
            // Show Alert
            Alert::toast("Delete item successfully", "success");

            return redirect("/home");
        }
    }
}
