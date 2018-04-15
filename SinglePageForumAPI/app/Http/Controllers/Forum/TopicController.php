<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Section;
use App\Models\Topic;
use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\GetTopicsForumRequest;
use App\Http\Requests\Forum\CreateTopicForumRequest;
use App\Transformers\UserTransformer;
use App\Transformers\TopicTransformer;

class TopicController extends Controller
{
    public function index(GetTopicsForumRequest $request, Section $section)
    {
      $topics = $section->find($request->get('section_id'))->topics()->latestFirst()->get();

      return fractal()
             ->collection($topics)
             ->includeUser()
             ->transformWith(new TopicTransformer)
             ->toArray();
    }

    public function show(Topic $topic)
    {
      return fractal()
             ->item($topic)
             ->includeUser()
             ->includePosts()
             ->transformWith(new TopicTransformer)
             ->toArray();
    }

    public function store(CreateTopicForumRequest $request)
    {
      $topic = $request->user()->topics()->create([
           'title' => $request->json('title'),
           'slug' => str_slug($request->json('title')),
           'body' => $request->json('body'),
           'section_id' => $request->json('section_id'),
      ]);

      return fractal()
            ->item($topic)
            ->includeUser()
            ->includeSection()
            ->transformWith(new TopicTransformer)
            ->toArray();
    }

}
