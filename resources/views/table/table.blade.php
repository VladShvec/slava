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
        <div class="alert alert-dark notification right hide" id="notification">
            <p class="font-semibold text-white">{{ session('status') }}</p>
        </div>
    @endif
    <a href="{{ route('excel.index') }}" class="btn btn-primary notification left hide" id="showRows">
        <p class="font-semibold  text-white">Вернуться обратно</p>
    </a>
    <div class="container padding-percentage p-16 hide" id="homeLoginNotification">
        <h2 class='mb-3 font-semibold  text-white'>Таблицы данных</h2>
        <div class="bg-gray-100">
            <table id="dtBasicExample" class="table" width="100%">
                <thead>
                <tr>
                    <th class="th-sm">Идент.
                    </th>
                    <th class="th-sm">Имя
                    </th>
                    <th class="th-sm">Дата
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($rows as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->date }}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Идент.
                    </th>
                    <th>Имя
                    </th>
                    <th>Дата
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
