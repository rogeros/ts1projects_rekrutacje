<div class="text-sm">
    <a href="{{ route('article.show', $getRecord()) }}" class="text-blue-700">View</a>
    @if(auth()->user()->id == $getState())
        <a href="" class="text-blue-700">Edit</a>
        <a href="" class="text-red-600">Remove</a>
    @endif
</div>
