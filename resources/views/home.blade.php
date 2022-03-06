@extends('layouts.app')

@section('content')

<div class="d-flex p-3">

    @include('home.layouts.menu')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        {{ __('You are logged in!') }}<hr><br>
                        {{-- <p>Total posts: {{ $count_all_post }}</p> --}}
                        <p>Total posts: {{ count($posts) }}</p>
                        <p>Total posts by the author `{{ auth()->user()->name }}` : {{ $author_post }}</p>
                        <p>Total comments: {{ $count_all_comment }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
