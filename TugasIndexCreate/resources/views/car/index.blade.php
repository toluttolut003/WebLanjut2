<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Mobil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <x-primary-button tag="a" href="{{ route('form') }}">Tambah Data Mobil</x-primary-button>
            </div>
            
            <x-table>
                <x-slot name="header">
                    <tr>
                        <th>#</th>
                        <th>Merek</th>
                        <th>harga</th>
                        <th>Keluaran</th>
                    </tr>
                </x-slot>

                @php $num=1; @endphp
                @foreach($cars as $car)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $car->merk }}</td>
                        <td>{{ $car->harga }}</td>
                        <td>{{ $car->Keluaran }}</td>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>
</x-app-layout>
