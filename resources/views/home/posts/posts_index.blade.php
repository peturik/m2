@extends('admin.layouts.main')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.layouts.sidebar_admin')

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Your Posts</h3>
                    </div>
                    @include('admin.layouts.menu')

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(count($posts) > 0)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Posts</th>
                                    <th>Category</th>
                                    <th colspan ="2">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td><a href="{{ route('post', ['post' => $post->id]) }}">{{ $post->title }}</a></td>
                                        <td>{{ $post->category->title }}</td>
                                        <td>{{ mb_substr($post->body, 0, 300) }}</td>
                                        <td><a href="{{ route('posts.edit', ['post' => $post->id]) }}">Update</a></td>
                                        <td><a href="{{ route('posts.show', ['post' => $post->id]) }}">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                                <h3>Not posts</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
