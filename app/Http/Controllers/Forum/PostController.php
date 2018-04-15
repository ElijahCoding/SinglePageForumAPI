<?php

namespace App\Http\Controllers\Forum;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\CreatePostFormRequest;

class PostController extends Controller
{
    public function store(CreatePostFormRequest $request, Topic $topic)
    {
      $post = $topic->posts()->create([
        'body' => $request->json('body'),
        'user_id' => $request->user()->id
      ]);


    }
}
