<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('post');
    }

    public function create(Request $request)
    {

        if (true) {
            $post=Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'user_id' => Auth::user() ? Auth::id():'11',
        ]);
            return response()->json($post);
        }else
            return response()->json(false);

    }

    public function show()
    {
        return response()->json(Post::all());
    }
}
