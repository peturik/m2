@extends('admin.layouts.main')

@section('title', 'Comment: Edit')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.layouts.sidebar_admin')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit comment in Post <a href="{{ route('post', ['post' => $comment->post->id]) }}"> {{ $comment->post->title }}</a></h3>
                    </div>

                    @include('admin.layouts.menu')

                    <div class="card-body">
                        <article class="blog-post">

                            <form action="{{ route('comments.update', ['comment' => $comment->id]) }} " method="post">
                                @csrf
                                @method('PATCH')

                                <div class="form-group m-2">
                                    <label>
                                        <textarea id="summernote"
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



            </div>

            {{--            @include('layouts.sidebar')--}}

        </div>
    </div>
@endsection

