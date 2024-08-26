<div class="text-sm">
    <a href="{{ route('article.show', $getRecord()) }}" class="text-blue-700">View</a>
    @if(auth()->user()->id == $getState())
        <a href="{{ route('article.edit', $getRecord()) }}" class="text-blue-700">Edit</a>
        <a href="{{ route('article.destroy', $getRecord()) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $getRecord()->id }}').submit();" class="text-red-600">Remove</a>

        <form id="delete-form-{{ $getRecord()->id }}" action="{{ route('article.destroy', $getRecord()) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endif
</div>
