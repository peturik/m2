@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="d-flex p-3">

    @include('home.layouts.menu')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Your Posts
                    </div>
                   

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
                                        <td><a href="{{ route('post.edit', ['post' => $post->id]) }}">Update</a></td>
                                        <td><a href="{{ route('post.show', ['post' => $post->id]) }}">Delete</a></td>
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
</div>



   
@endsection
