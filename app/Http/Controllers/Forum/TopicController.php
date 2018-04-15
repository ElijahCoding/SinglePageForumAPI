<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Section;
use App\Models\Topic;
use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\CreateTopicForumRequest;

class TopicController extends Controller
{
    public function index(Request $request, Section $section)
    {

    }

    public function show(Topic $topic)
    {

    }

    public function store(CreateTopicForumRequest $request)
    {
      $request->user()->topics()->create([
           'title' => $request->json('title'),
           'slug' => str_slug($request->json('title')),
           'body' => $request->json('body'),
           'section_id' => $request->json('section_id'),
      ]);
    }
}
