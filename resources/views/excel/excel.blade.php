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
    @if (session('status'))
        <div class="alert alert-dark notification notification-2 right hide" id="notification">
            <p class="font-semibold text-white">{{ session('status') }}</p>
        </div>
    @endif
    <div class="alert alert-dark notification notification-2 notification-socket right hide" id="notificationSocket">
        <p id="SocketMessage" class="font-semibold text-white"></p>
    </div>
    <a href="{{ route('table.index') }}" class="btn btn-primary notification left hide" id="showRows">
        <p class="font-semibold  text-white">Посмотреть таблицу</p>
    </a>
    <div class="container padding-percentage hide w-50" id="homeLoginNotification">
        <div class="row justify-content-center">
            <form
                action="{{ route('excel.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                <label class="form-label text-white" for="excelFile">Загрузите ваш файл</label>
                <input type="file" name="excelFile" class="form-control mb-2 bg-dark font-semibold text-white" id="excelFile" />
                @if($errors->has('excelFile'))
                    <span class="invalid-feedback d-block mb-3" role="alert">
                        <strong>{{ $errors->first('excelFile') }}</strong>
                    </span>
                @endif
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
@endsection
