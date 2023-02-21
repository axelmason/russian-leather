<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function personal()
    {
        return view('pages.personal');
    }
    // public function index()
    // {
    //     return view('catalog.index');
    // }

    // public function subcategory($parentSlug)
    // {
    //     $parent = Category::where('slug', $parentSlug)->with('categories')->get();

    //     return view("catalog.{$parentSlug}.")
    // }
}
