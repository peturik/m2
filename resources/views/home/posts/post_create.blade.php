@extends('app.main')
@section('title', 'Post: Create')

@section('content')
    <div class="container">
        <div class="row justify-content-center">{{-- row g-4 --}}
<!--            @include('admin.layouts.sidebar_admin')-->

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3>Create New Post</h3>
                    </div>

<!--                    @include('admin.layouts.menu')-->

                    <div class="card-body">
                        <article class="blog-post">

                            <form action="{{ route('posts.store') }} " method="post">
                                @csrf
                                <div class="form-group m-2">
                                    <label for="title"></label>
                                    <input id="title"
                                           type="text"
                                           name="title"
                                           placeholder="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title') }}">

                                    @error('title')
                                    <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <div class="form-group m-2">
                                    <label for="category">Category</label>
                                    <select required name="category" id="category"
                                            class="form-select @error('category') is-invalid @enderror">
                                        <option disabled selected>
                                            Select a Category
                                        </option>
                                        @if(count($categories))
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        @endif
                                        @error('category')
                                        <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
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
                                                  rows="10"
                                                  cols="45"
                                                  placeholder="Body"
                                                  class="form-control @error('body') is-invalid @enderror">
                                            {!! old('body') !!}
                                        </textarea>
                                        @error('body')
                                        <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </label>

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

