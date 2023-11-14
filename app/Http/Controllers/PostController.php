<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
