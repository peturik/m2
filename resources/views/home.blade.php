@extends('layouts.app')

@section('content')

<div class="d-flex p-3">
    <div class="home-sidebar mb-col-2 p-3 bg-white" style="width: 280px;">
        <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
            <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-5 fw-semibold">Сворачиваемый</span>
        </a>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    Главная
                </button>
                <div class="collapse" id="home-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                        <li><a href="#" class="link-dark rounded">Обзор</a></li>
                        <li><a href="#" class="link-dark rounded">Обновления</a></li>
                        <li><a href="#" class="link-dark rounded">Отчеты</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Панель
                </button>
                <div class="collapse" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small  ps-4">
                        <li><a href="#" class="link-dark rounded">Обзор</a></li>
                        <li><a href="#" class="link-dark rounded">Еженедельно</a></li>
                        <li><a href="#" class="link-dark rounded">Ежемесячно</a></li>
                        <li><a href="#" class="link-dark rounded">Ежегодно</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    Заказы
                </button>
                <div class="collapse" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small  ps-4">
                        <li><a href="#" class="link-dark rounded">Новый</a></li>
                        <li><a href="#" class="link-dark rounded">Обработанный</a></li>
                        <li><a href="#" class="link-dark rounded">Отправленный</a></li>
                        <li><a href="#" class="link-dark rounded">Возвращенный</a></li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    Account
                </button>
                <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                        <li><a href="#" class="link-dark rounded">Новый...</a></li>
                        <li><a href="#" class="link-dark rounded">Профиль</a></li>
                        <li><a href="#" class="link-dark rounded">Настройка</a></li>
                        <li><a href="#" class="link-dark rounded">Выйти</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
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
                        <p>Total posts: {{ $count_all_post }}</p>
                        <p>Total posts by the author `{{ auth()->user()->name }}` : {{ $count_all_post }}</p>
                        <p>Total comments: {{ $count_all_comment }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
