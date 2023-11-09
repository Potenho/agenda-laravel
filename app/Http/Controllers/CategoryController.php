<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('pages.categories', ['categories' => $categories]);
    }

    public function specific(int $id)
    {
        $category = Category::find($id);

        return view('pages.visit-category', ['category' => $category]);
    }
}
