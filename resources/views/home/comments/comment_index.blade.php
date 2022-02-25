@extends('admin.layouts.main')
@section('title', 'Comments')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.layouts.sidebar_admin')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
{{--                        <h3>Welcome, {{ Auth::user()->name }}!</h3>--}}
                        <h3>Comments on your posts</h3>
                    </div>
                    @include('admin.layouts.menu')

                    <div class="card-body">
{{--{{ dd(auth()->user()->id) }}--}}
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
                                        <td><a href="{{ route('comments.edit', ['comment' => $comment->id]) }}">Update</a></td>
                                        <td><a href="{{ route('comments.show', ['comment' => $comment->id]) }}">Delete</a></td>
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
@endsection
