<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Mobil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="post" action="{{ route('car.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf

                    <div class="max-w-xl">
                        <x-input-label for="merk" value="merk"/>
                        <x-text-input id="merk" type="text" name="merk" class="mt-1 block w-full" value="{{ old('')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('merk')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="harga" value="harga"/>
                        <x-text-input id="harga" type="text" name="harga" class="mt-1 block w-full" value="{{ old('')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('harga')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="Keluaran" value="Keluaran"/>
                        <x-text-input id="Keluaran" type="number" name="Keluaran" class="mt-1 block w-full" value="{{ old('')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('Keluaran')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-secondary-button tag="a" href="{{ route('car') }}">Cancel</x-secondary-button>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
