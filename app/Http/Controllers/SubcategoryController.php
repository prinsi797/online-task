<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Subcategory;

use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index($category_id)
    {
        $category = Category::findOrFail($category_id);
        $subcategories = $category->subcategories;
        return response()->json(['subcategories' => $subcategories]);
    }

    public function store(Request $request, $category_id)
    {
        $category = Category::findOrFail($category_id);
        $subcategory = $category->subcategories()->create($request->all());
        return response()->json(['subcategory' => $subcategory], 201);
    }

    public function show($category_id, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        return response()->json(['subcategory' => $subcategory]);
    }

    public function update(Request $request, $category_id, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->update($request->all());
        return response()->json(['subcategory' => $subcategory]);
    }

    public function destroy($category_id, $id)
    {
        Subcategory::destroy($id);
        return response()->json(['message' => 'Subcategory deleted successfully']);
    }
}
