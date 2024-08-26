<div class="w-full">

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-md border border-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

{{--    @if(is_int($article))--}}
{{--        <form action="{{ route('article.update', $article) }}" method="POST">--}}
{{--            @csrf--}}
{{--            @method('PUT')--}}
{{--    @else--}}
{{--        <form action="{{ route('article.store') }}" method="POST" id="form-submit" >--}}
{{--            @csrf--}}
{{--    @endif--}}


        <form wire:submit="send">

        {{ $this->form }}

        <button type="submit" class="block w-full mt-12 pt-3 px-4 py-2 text-sm font-medium text-white bg-green-600 border border-gray-300 leading-5 rounded-md hover:text-yellow-200 focus:outline-none focus:ring-blue focus:border-blue-300 active:bg-green-800 active:text-gray-200 transition ease-in-out duration-150">
            Submit
        </button>

    </form>

    <x-filament-actions::modals />
</div>
