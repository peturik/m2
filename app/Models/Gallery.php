<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['image', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
