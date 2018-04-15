<?php

namespace App\Transformers;

use App\Models\Topic;
use League\Fractal\TransformerAbstract;

class TopicTransformer extends TransformerAbstract
{
  public function transform(Topic $topic)
  {
    return [
      'id' => $topic->id,
      'title' => $topic->title,
      'slug' => $topic->slug,
      'body' => $topic->body,
      'diffForHumans' => $topic->created_at->diffForHumans(),
    ];
  }
}
