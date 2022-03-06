@extends('layouts.app')

@section('title', 'Comment: Edit')

@section('content')
<div class="d-flex p-3">

    @include('home.layouts.menu')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit comment in Post <a href="{{ route('post', ['post' => $comment->post->id]) }}"> {{ $comment->post->title }}</a></h3>
                    </div>

                   

                    <div class="card-body">
                        <article class="blog-post">

                            <form action="{{ route('comment.update', ['comment' => $comment->id]) }} " method="post">
                                @csrf
                                @method('PATCH')

                                <div class="form-group m-2">
                                    <label>
                                        <textarea id="mytextarea"
                                                  name="body"
                                                  contenteditable="true"
                                                  placeholder="Body"
                                                  class="form-control w-full @error('body') is-invalid @enderror">

                                            {!! old('body',$comment->body) !!}
                                        </textarea>
                                    </label>
                                    @error('body')
                                    <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <input type="submit">
                            </form>
                            <hr>
                            <p class="blog-post-meta small">Posted on
                                <span><em>
{{--                                {{ $post->created_at->diffForHumans() }}--}}
                                    {{ $comment->created_at->toFormattedDateString() }}</em>
                                </span>
                                by <b>{{ $comment->user->name }}</b>
                            </p>
                            <hr>
                        </article>
                    </div>
                </div>



            </div>

        </div>
    </div>
</div>
@endsection

