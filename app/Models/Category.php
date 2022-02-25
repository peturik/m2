<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'title', 'slug', 'description'];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

}
