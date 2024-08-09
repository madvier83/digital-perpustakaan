<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Buku Saya') }}
            </h2>
            <a href="/buku/create" class="btn btn-primary btn-sm text-white">Tambah Buku</a>
        </div>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- <form action="{{ route('buku-saya.index') }}" method="GET" class="mb-8">
                        <label class="form-control w-full max-w-md mt-2">
                            <div class="label">
                                <span class="label-text font-bold">Filter berdasarkan Kategori</span>
                            </div>
                            <select name="kategori_id" class="select select-sm p-0 px-4 select-bordered"
                                onchange="this.form.submit()">
                                <option value="">Tampilkan Semua Kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ $selectedKategori == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                    </form> --}}

                    <div class="overflow-x-auto">
                        <table class="table ">
                            <!-- head -->
                            <thead>
                                <tr class="text-black">
                                    <th>#</th>
                                    <th>Cover</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bukus as $buku)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>
                                            <a href="/buku/{{ $buku->id }}">
                                                <img class="w-10 h-10 border cursor-pointer transition-all duration-200 hover:brightness-50"
                                                    src="{{ asset('storage/' . $buku->cover) }}"
                                                    alt="{{ $buku->cover }}">
                                            </a>
                                        </td>
                                        <td>{{ Str::limit($buku->judul, 30) }}</td>
                                        <td>{{ $buku->kategori->nama }}</td>
                                        <td>{{ Str::limit($buku->deskripsi, 50) }}</td>
                                        <td>{{ $buku->jumlah }}</td>
                                        <td>
                                            <div class="flex gap-2">
                                                <a href="buku/{{ $buku->id }}"
                                                    class="btn btn-xs btn-info text-white">Detail</a>
                                                <a href="buku/{{ $buku->id }}/edit"
                                                    class="btn btn-xs btn-success text-white">Edit</a>
                                                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Hapus buku permanen?')"
                                                        class="btn btn-xs btn-error text-white">Delete</button>
                                                </form>
                                            </div>
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
