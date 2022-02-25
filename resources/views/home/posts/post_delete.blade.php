@extends('admin.layouts.main')
@section('title', 'Delete/'.$post->slug)

@section('content')
    <div class="container">
        <div class="row justify-content-center">{{--class="row g-5"--}}
            @include('admin.layouts.sidebar_admin')

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Delete {{ $post->title }}</h3>
                    </div>

                    @include('admin.layouts.menu')

                    <div class="card-body">
                        <article class="blog-post">
                            <h2 class="blog-post-title">
                                <a href="{{ route('post', ['post' => $post->id]) }}"> {{ $post->title }}</a>
                            </h2>

                            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete this post">
                            </form>

                            <p class="blog-post-meta small">Posted on
                                <span>
{{--                                {{ $post->created_at->diffForHumans() }}--}}
                                    {{ $post->created_at->toFormattedDateString() }}
                        </span>
                                by {{ $post->user->name }}
                            </p>

                            <p>{!! $post->body !!}</p>
                            <hr>

                        </article>
                    </div>
                </div>



{{--                @livewire('comments')--}}
            </div>

{{--            @include('layouts.sidebar')--}}

        </div>
    </div>

@endsection
