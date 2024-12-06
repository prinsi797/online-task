<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category_id)
    {
        $category = Category::findOrFail($category_id);
        $products = $category->products;
        return response()->json(['products' => $products]);
    }

    public function store(Request $request, $category_id)
    {
        $category = Category::findOrFail($category_id);
        $products = $category->products()->create($request->all());
        return response()->json(['products' => $products], 201);
    }

    public function show($category_id, $id)
    {
        $products = Product::findOrFail($id);
        return response()->json(['products' => $products]);
    }

    public function update(Request $request, $category_id, $id)
    {
        $products = product::findOrFail($id);
        $products->update($request->all());
        return response()->json(['products' => $products]);
    }

    public function destroy($category_id, $id)
    {
        product::destroy($id);
        return response()->json(['message' => 'product deleted successfully']);
    }
}
