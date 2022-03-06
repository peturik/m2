<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Auth;

class CommentAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home.comments.comment_index', ['comments' => Comment::where('user_id', auth()->user()->id)->get()]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }




    public function edit(Comment $comment)
    {
        return view('home.comments.comment_edit', compact('comment'));
    }


    private const POST_VALIDATOR = [
        'body' => 'required',
    ];

    private const POST_ERROR_MESSAGES = [
        'body.required' => 'The body field is required :)',
    ];

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate(self::POST_VALIDATOR, self::POST_ERROR_MESSAGES);

        $comment->fill([
            'user_id' => auth()->user()->id,
            'body' => $validated['body'],
            'post_id' => $comment->post->id,
        ]);
        $comment->save();
        // return redirect()->route('post', [$comment->post->id]);
        return redirect()->route('comment.index');
    }

    public function show(Comment $comment)
    {
        return view('home.comments.comment_delete', ['comment' => $comment]);
    }

 
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect(route('comment.index'));
    }
}
