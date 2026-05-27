<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Rak Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <x-primary-button tag="a" href="{{ route('shelf.create') }}">Tambah rak buku</x-primary-button>
            </div>
            
            <x-table>
                <x-slot name="header">
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Nama</th>
                    </tr>
                </x-slot>

                @php $num=1; @endphp
                @foreach($shelfs as $shelf)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $shelf->code}}</td>
                        <td>{{ $shelf->name}}</td>
                        <td class="flex gap-2">
                            <x-primary-button tag="a" href="{{ route('shelf.edit',$shelf->id) }}">edit</x-primary-button>
                            <form action="{{ route('shelf.destroy', $shelf->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <x-danger-button onclick="return confirm('yakin ingin menghapus buku ini?')">Hapus</x-danger-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>
</x-app-layout>