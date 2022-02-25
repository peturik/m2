<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $newComment;
    public $comments;
    public $postId;
    public $user;

    public $commentUser = [];

    public function mount()
    {
        $this->postId = trim(strrchr(url()->current(), '/'), '/');
        $this->comments = Comment::where('post_id', $this->postId)->latest()->get();

        $this->user = auth()->user();
    }

    protected  $rules = [
        'newComment' => 'required|string',
        ];

    public function addComment()
    {
//        dd($this->commentUser);
        $this->validate();

        $setComment = new Comment();
        $setComment->user_id = $this->user->id;
        $setComment->body = $this->newComment;
        $setComment->post_id = $this->postId;

        if ($setComment->save()) {
            array_unshift($this->commentUser,
                [
                    'body' => $this->newComment,
                    'created_at' => Carbon::now()->diffForHumans(),
                    'user' => $this->user->name,
                ]
            );
            $this->newComment = '';
        }
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
