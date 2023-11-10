<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function likeButton()
    {
        return response()->json(['success' => true]);
    }

}
