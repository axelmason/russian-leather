<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($categorySlug = null)
    {
        if($categorySlug === null) {
            $category = Category::where('slug', 'products')->first();

            $categories = Category::query()->where('parent_id', $category->id)->first()->children;

            return view('catalog.index', compact('categories'));
        }

        $category = Category::where('slug', $categorySlug)->first();

        $products = $category->products()->paginate(6);

        return view('catalog.products', compact('products'));
    }
}
