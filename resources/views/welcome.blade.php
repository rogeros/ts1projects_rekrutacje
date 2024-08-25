@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center sm:items-center bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">

        @livewire('auth.menu')

        @auth()
            <div>
                You are logged in as <b>{{ auth()->user()->name }}</b>

                <a href="{{ route('article.create') }}" class="block w-36 pt-3 px-4 py-2 text-sm font-medium text-white bg-green-600 border border-gray-300 leading-5 rounded-md hover:text-yellow-200 focus:outline-none focus:ring-blue focus:border-blue-300 active:bg-green-800 active:text-gray-200 transition ease-in-out duration-150">Add new article</a>

                <div class="sm:mx-auto sm:w-full">
                    <h2 class="mt-12 text-center text-gray-900 leading-9">
                        @livewire('articles-list')
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
