@extends('admin.layouts.main')
@section('title', 'Delete comment')

@section('content')
    <div class="container">
        <div class="row justify-content-center">{{--class="row g-5"--}}
            @include('admin.layouts.sidebar_admin')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Delete comment in <a
                                href="{{ route('post', ['post' => $comment->post->id]) }}"> {{ $comment->post->title }}</a>
                        </h3>
                    </div>

                    @include('admin.layouts.menu')

                    <div class="card-body">
                        <article class="blog-post">

                            <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete this post">
                            </form>

                            <p>{{ $comment->body }}</p>
                            <hr>
                            <p class="blog-post-meta small">Posted on
                                <span>
{{--                                {{ $post->created_at->diffForHumans() }}--}}
                                    {{ $comment->created_at->toFormattedDateString() }}
                                </span>
                                by {{ $comment->user_id }}
                            </p>
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
