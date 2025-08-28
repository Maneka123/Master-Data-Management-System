<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::all();
        return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all(); // or ->pluck('name', 'id') if you want key-value pairs
        $categories = Category::all();

        return view('admin.item.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Step 1: Validate input
    $validated = $request->validate([
        'brand_id'    => 'required|exists:brands,id',
        'category_id' => 'required|exists:categories,id',
        'code'        => 'required|string|unique:items,code',
        'name'        => 'required|string|max:255',
        'attachment'  => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx|max:2048', // max 2MB
        'status'      => 'required|in:Active,Inactive',
    ]);

    // Step 2: Handle file upload if present
    if ($request->hasFile('attachment')) {
        $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        $validated['attachment'] = $attachmentPath;
    }

    // Step 3: Store item in DB
    Item::create($validated);

    // Step 4: Redirect with success message
    return redirect()->back()->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Item::find($id);
         $brands = Brand::all(); // or ->pluck('name', 'id') if you want key-value pairs
        $categories = Category::all();
        return view('admin.item.edit',compact('item','brands','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $item = Item::findOrFail($id);

    // Step 1: Validate
    $validated = $request->validate([
        'brand_id'    => 'required|exists:brands,id',
        'category_id' => 'required|exists:categories,id',
        'code'        => 'required|string|unique:items,code,' . $item->id, // ignore current item
        'name'        => 'required|string|max:255',
        'attachment'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'status'      => 'required|in:Active,Inactive',
    ]);

    // Step 2: Handle image upload
    if ($request->hasFile('attachment')) {
        // Optional: Delete old image from storage
        if ($item->attachment && \Storage::disk('public')->exists($item->attachment)) {
            \Storage::disk('public')->delete($item->attachment);
        }

        // Store new image
        $validated['attachment'] = $request->file('attachment')->store('attachments', 'public');
    } else {
        // Keep the old image
        $validated['attachment'] = $item->attachment;
    }

    // Step 3: Update item
    $item->update($validated);

    // Step 4: Redirect
    return redirect()->route('items.index')->with('message', 'Item updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
