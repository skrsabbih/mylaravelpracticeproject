<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // product index page
    public function index(Request $request)
    {
        $categories = Category::all();
        // product query 
        $productsQuery = Product::with('category');
        // category filter
        if ($request->has('category')) {
            $productsQuery->where('category_id', $request->category);
        }
        $products = $productsQuery->latest()->paginate(25);
        return view('frontend.products.index', compact('categories', 'products'));
    }

    public function show(Product $product)
    {
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(4)
            ->get();
        return view('frontend.products.show', compact('product', 'relatedProducts'));
    }
}
