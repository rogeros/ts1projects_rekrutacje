@extends('layouts.app')

@section('content')

    <style>
        @media(prefers-color-scheme: dark){ .bg-dots{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(200,200,255,0.15)'/%3E%3C/svg%3E");}}@media(prefers-color-scheme: light){.bg-dots{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,50,0.10)'/%3E%3C/svg%3E")}}
    </style>

    <div class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center sm:items-center bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">

        @if (Route::has('login'))
            <div class="p-6 text-right sm:fixed sm:top-0 sm:right-0">
                @auth
                    <a href="{{ route('home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Home</a>
                    |
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                @else
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        @auth()
            <div>
                <div class="sm:mx-auto sm:w-full">
                    <h2 class="mt-12 text-3xl font-extrabold text-center text-gray-900 leading-9">
                        Yupiiiii
                    </h2>
                </div>
            </div>
        @elseguest
            <div>
                <div class="sm:mx-auto sm:w-full">
                    <h2 class="mt-12 text-3xl font-extrabold text-center text-gray-900 leading-9">
                        Only authenticated users can view articles.
                    </h2>

                    @livewire('auth.login')

                    @if (Route::has('register'))
                        <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
                            Or
                            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                                create a new account
                            </a>
                        </p>

                        <p class="mt-12 text-sm text-left text-gray-600 leading-5 max-w">
                            You can also use predefined users.<br />
                        </p>

                        <p class="mt-4 text-sm text-left text-gray-600 leading-5 max-w">
                            <b>Test User 1</b><br />
                            email: user_1@example.com<br />
                            password: pass_1
                        </p>

                        <p class="mt-3 text-sm text-left text-gray-600 leading-5 max-w">
                            <b>Test User 2</b><br />
                            email: user_2@example.com<br />
                            password: pass_2
                        </p>

                        <p class="mt-3 text-sm text-left text-gray-600 leading-5 max-w">
                            <b>Test User 3</b><br />
                            email: user_3@example.com<br />
                            password: pass_3
                        </p>
                    @endif
                </div>
            </div>
        @endauth

    </div>
@endsection
