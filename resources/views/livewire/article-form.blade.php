<div>
    <form wire:submit="create">
        {{ $this->form }}

        <button type="submit" class="block w-full mt-12 pt-3 px-4 py-2 text-sm font-medium text-white bg-green-600 border border-gray-300 leading-5 rounded-md hover:text-yellow-200 focus:outline-none focus:ring-blue focus:border-blue-300 active:bg-green-800 active:text-gray-200 transition ease-in-out duration-150">
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>
