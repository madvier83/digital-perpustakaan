<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tabel Kategori') }}
            </h2>

            <a href="/kategori/create" class="btn btn-primary btn-sm text-white">Tambah Kategori</a>
        </div>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-xl font-bold">
                    </h1>
                    <div class="overflow-x-auto">
                        <table class="table ">
                            <!-- head -->
                            <thead>
                                <tr class="text-black">
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $kategori)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $kategori->nama }}</td>
                                        <td>
                                            @if ($kategori->id != '1')
                                                <div class="flex gap-2">
                                                    <a href="kategori/{{ $kategori->id }}"
                                                        class="btn btn-xs btn-info text-white">Detail</a>
                                                    <a href="kategori/{{ $kategori->id }}/edit"
                                                        class="btn btn-xs btn-success text-white">Edit</a>
                                                    <form action="{{ route('kategori.destroy', $kategori->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Hapus kategori permanen?')"
                                                            class="btn btn-xs btn-error text-white">Delete</button>
                                                    </form>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
