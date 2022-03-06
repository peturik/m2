@extends('layouts.app')
@section('title', 'Comments')

@section('content')

<div class="d-flex p-3">

    @include('home.layouts.menu')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Comments on your posts
                    </div>
                    

                    <div class="card-body">
                        @if(count($comments) > 0)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Posts</th>
                                    <th>User name</th>
                                    <th>Content</th>
                                    <th colspan ="2">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td><a href="{{ route('post', ['post' => $comment->post_id]) }}">{{ $comment->post->title }}</a></td> 
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->body }}</td>
                                        <td><a href="{{ route('comment.edit', ['comment' => $comment->id]) }}">Update</a></td>
                                        <td><a href="{{ route('comment.show', ['comment' => $comment->id]) }}">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                                <h3>Not comments on your posts</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
