<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return view('pages.categories', ['categories' => $categories]);
    }




    public function specific(int $id, Request $request)
    {
        $category = Category::find($id);

        if (!$category)
        {
            return redirect()->route('category.index');
        }

        $post_id = $request->query('post_id');

        if ($post_id)
        {
            $post = $category->posts()->find($post_id);

            if (!$post)
            {
                return view('pages.posts-category', ['category' => $category]); 
            }

            return view('pages.comments-category', ['category' => $category, 'post' => $post]);
        }

        return view('pages.posts-category', ['category' => $category]);
    }
}
