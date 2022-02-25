@extends('admin.layouts.main')

@section('title', 'Post: Edit')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.layouts.sidebar_admin')

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Post <strong>{{ $post->title }}</strong></h3>
                    </div>

                    @include('admin.layouts.menu')

                    <div class="card-body">
                        <article class="blog-post">

                            <form action="{{ route('posts.update', ['post' => $post->id]) }} " method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-group m-2">
                                    <label for="title"></label>
                                    <input id="title"
                                           type="text"
                                           name="title"
                                           placeholder="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title', $post->title) }}">

                                    @error('title')
                                    <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror

                                </div>

                                <div class="form-group m-2">
                                    <label for="category">Category</label>
                                    <select required name="category" id="category" class="form-select">

                                        @if(count($categories))
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        @endif

                                    </select>

                                    @error('category')
                                    <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <div class="form-group m-2">
                                    <label>
                                        <textarea id="summernote"
                                                  name="body"

                                                  contenteditable="true"
                                                  placeholder="Body"
                                                  class="form-control w-full @error('body') is-invalid @enderror">

                                            {!! old('body',$post->body) !!}
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
                            @if ($errors->any())
                                <div class="errors">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </article>
                    </div>
                </div>



            </div>

            {{--            @include('layouts.sidebar')--}}

        </div>
    </div>
@endsection

