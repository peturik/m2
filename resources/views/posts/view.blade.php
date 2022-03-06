@extends('layouts.main')
@if(isset($post))
    @section('title', 'Post/'.$post->slug)

@section('content')
    <div class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom text-center">

                    {{ $post->title }}
                </h3>


                <article class="blog-post">
                    {{--<h2 class="blog-post-title">
                        <a href="#"> {{ $post->title }}</a>
                    </h2>--}}

                    <p class="blog-post-meta small">Posted on
                        <span>
{{--                                {{ $post->created_at->diffForHumans() }}--}}
                            {{ $post->created_at->toFormattedDateString() }}
                        </span>
                         by {{ $post->user->name }}
                        <br>
                        @auth
                            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                {{--                        <a href = “{{ url()->current() }}/update”>Update this post</a>--}}
                                <a href="{{ route('post.edit', ['post' => $post->id]) }}">Update this post</a>
                            @endif
                        @endauth
                    </p>

                    <p>{!! $post->body !!}</p>
                    <p class="small">Category: <a href="{{ route('category', ['slug' => $post->category->slug]) }}"><span>{{ $post->category->title }}</span></a></p>
                    <hr>

                </article>
                @livewire('comments')
            </div>

            @include('layouts.sidebar')

        </div>
    </div>

@endsection
@endif
