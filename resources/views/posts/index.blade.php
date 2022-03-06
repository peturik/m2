@extends('layouts.main')

@if(isset($category))
@section('title', 'Category: ' . $category->title)
@else
@section('title', 'Main')
@endif

@section('content')

<div class="container">
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4  border-bottom text-center"> {{-- fst-italic--}}
                @if(isset($category))
                Category: {{ $category->title }}
                @else
                Main
                @endif
            </h3>

            <article class="blog-post">

                @foreach($posts as $post)
                <h2 class="blog-post-title">
                    <a href="{{ route('post', ['post' => $post->id]) }}"> {{ $post->title }}</a>
                </h2>
                <p class="blog-post-meta small">Posted on
                    <span>
{{--                                {{ $post->created_at->diffForHumans() }}--}}
                                {{ $post->created_at->toFormattedDateString() }}
                            </span>
                    by {{ $post->user->name }}
                    <br>
                    @auth
                    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin() && auth()->user()->id == $post->user->id)
                    {{--<a href = “{{ url()->current() }}/update”>Update this post</a>--}}
                    <a href="{{ route('post.edit', ['post' => $post->id]) }}">Update this post</a>
                    @endif
                    @endauth
                </p>

                {{--                        <p>{!! $post->body !!}--}}{{-- mb_substr(, 0, 300) --}}{{--</p>--}}
                {{--                    {{ dd(strpos($post->body, '<cut>')) }}--}}

                    @if(strpos($post->body, '<cut>') > 0)
                        <p>{!! substr($post->body, 0, strpos($post->body, '<cut>')) !!}</p>
                        <button type="button" class="btn btn-light pb-2"><a href="{{ route('post', ['post' => $post->id]) }}">Read more...</a></button>
                        @else
                        <p>{!! $post->body !!}</p>
                        @endif


                        <p class="small">Category: <a href="{{ route('category', ['slug' => $post->category->slug]) }}"><span>{{ $post->category->title }}</span></a>
                        </p>
                        <hr>


                        @endforeach


            </article>
        </div>

       @include('layouts.sidebar')

    </div>
</div>

@endsection

