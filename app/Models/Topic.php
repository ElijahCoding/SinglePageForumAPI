<?php

namespace App\Models;

use App\Models\User;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $guarded = [];
    
    public function user()
    {
      return $this->belogsTo(User::class);
    }

    public function section()
    {
      return $this->belogsTo(Section::class);
    }
}
