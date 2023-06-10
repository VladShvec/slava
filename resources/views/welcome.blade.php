@extends('layouts.app')

@section('content')
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/home') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
            @else
                <a href="{{ route('login') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('Login') }}</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('Register') }}</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="">
                        <div
                            style="font-size: 18px;"
                            class="alert alert font-semibold text-gray-600 dark:text-gray-400 bg-dark"
                            role="alert">
                            <h4 class="alert-heading">Добро пожаловать!</h4>
                            <p>Это тестовое задание от компании SLAVA</p>
                            @auth
                                <p>Вы можете перейти на домашнюю страницу кликнув на кнопку home в правом верхнем углу!</p>
                            @else
                                <p>Для перехода на домашнюю страницу вам надо зарегистрироваться или авторизоваться</p>
                                <p>Нажмите на одну из правых верхних ссылок для соответственных действий!</p>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
