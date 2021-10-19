<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'website_id' => $request->website_id,
        ]);
        event(new NewPostPublished(Post::latest()->first()));
        return response()->json([
            'message' => 'post created successfuly'
        ]);
    }
}