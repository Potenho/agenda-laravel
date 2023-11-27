<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'numeric|required',
            'post_id' => 'numeric|nullable',
            'message' => 'required_without:image',
            'image' => 'required_without:message|image|mimes:jpeg,png,jpg,gif|nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = Post::create([
            'user_id' => Auth()->user()->id,
            'category_id' => $request['category_id'],
            'message' => $request['message'],
            'post_id' => $request['post_id'],
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $nameImage = time() . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('images'), $nameImage);

            $post->update([
                'image' => config('images.images_path').$nameImage,
            ]);


        }

        if ($request['post_id'])
        {
            return redirect()->route('category.specific',['id' => $request['category_id'], 'post_id' => $request['post_id']]);
        }

        return redirect()->route('category.specific', $request['category_id']);
    }

    public function likeButton(Request $request)
    {

        $request->validate([
            'postId' => 'numeric|required',
            'action' => 'string|required|in:like,unlike']);

        $post = Post::find($request['postId']);

        if (!$post) {

            return response()->json(['success' => false, 'error' => 'no_such_post']);
        }

        if ($request['action'] == 'unlike')
        {
            $like = Like::where('user_id',Auth()->user()->id)->where('post_id', $post->id)->first();

            if (!$like)
            {

                return response()->json(['success' => false, 'error' => 'no_such_like']);
            }

            $like->delete();

            return response()->json(['success' => true, 'likesCount' => $post->likes->count()]);
        }

        if (Like::where('user_id',Auth()->user()->id)->where('post_id', $post->id)->first())
        {
            return response()->json(['success' => false, 'error' => 'already_liked']);
        }


        Like::create([
            'user_id' => Auth()->user()->id,
            'post_id' => $post->id,
        ]);

        return response()->json(['success' => true, 'likesCount' => $post->likes->count()]);
    }

}
