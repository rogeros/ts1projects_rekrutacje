@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center sm:items-center bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">

        @livewire('auth.menu')

        @auth()
            <div class="w-2/3 max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">
                    {{ $article->title }}
                </h1>

                <div class="flex items-center justify-between text-gray-600 mb-6">
                    <span class="text-sm">
                        Author: <strong>{{ $article->user->name }}</strong>
                    </span>
                    <span class="text-sm">
                        Publication date: <strong>26 sierpnia 2024</strong>
                    </span>
                </div>

                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    {{ $article->body }}
                </div>
            </div>

        @endauth

    </div>
@endsection
