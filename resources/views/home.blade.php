@extends('layouts.app')

@section('content')
    @if (Route::has('login'))
        <div class="sm:fixed d-flex justify-content-between sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/home') }}"
                   class="font-semibold pr-3 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    style="margin-left: 20px"
                >
                    @csrf
                    <button
                        type="submit"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >
                        Logout
                    </button>
                </form>
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
    <div class="container padding-percentage hide" id="homeLoginNotification">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-secondary">
                    <div class="card-header animation-gradient text-white">Уведомление</div>
                    <div class="card-body bg-secondary text-white">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>Вы успешно вошли в систему!</p>
                        <p>Для загрузки Excel файла нажмите сюда!</p>
                        <div class="mt-3">
                            <a href="{{ route('excel.index') }}" class="btn animation-gradient text-white">Загрузить Excel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
