<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Rak Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="post" action="{{ route('shelf.update', $shelf->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div class="max-w-xl">
                        <x-input-label for="code" value="code"/>
                        <x-text-input id="code" type="text" name="code" class="mt-1 block w-full" value="{{ old('code', $shelf->code)}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('code')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="name" value="name"/>
                        <x-text-input id="name" type="text" name="name" class="mt-1 block w-full" value="{{ old('name', $shelf->name)}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-secondary-button tag="a" href="{{ route('bookshelf') }}">Cancel</x-secondary-button>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>