<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemSearchController extends Controller
{
    public function index(Request $request)  // <- inject Request here
    {
        $query = Item::query();

        if ($request->filled('search_code')) {
            $query->where('code', 'LIKE', '%' . $request->search_code . '%');
        }

        if ($request->filled('search_name')) {
            $query->where('name', 'LIKE', '%' . $request->search_name . '%');
        }

        if ($request->filled('search_status')) {
            $query->where('status', $request->search_status);
        }

        $items = $query->get();

        return view('admin.search', compact('items'));
    }
}
