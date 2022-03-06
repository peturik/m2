<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        // $count_all_post = Post::count();
        $count_all_comment = Comment::count();
        $author_post = Post::query()
            ->where('user_id', auth()->user()->id)
            ->count();
        return view ('home', compact('author_post', 'count_all_comment', 'posts'));
    }
}
