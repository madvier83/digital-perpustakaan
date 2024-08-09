<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Perpustakaan') }}
            </h2>

            <a href="{{ url()->previous() }}" class="btn btn-sm">Kembali</a>
        </div>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-xl font-bold mb-4">Tambah Buku</h1>
                    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <label class="form-control w-full max-w-md mt-2">
                            <div class="label">
                                <span class="label-text">Judul</span>
                            </div>
                            <input name="judul" type="text" value="{{ old('judul') }}" placeholder=""
                                class="input input-bordered w-full max-w-md" />
                            @error('judul')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label class="form-control w-full max-w-md mt-2">
                            <div class="label">
                                <span class="label-text">Kategori</span>
                            </div>
                            <select name="kategori_id" class="select select-bordered text-sm">
                                <option disabled {{ old('kategori_id') ? '' : 'selected' }}>Uncategorized</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </label>


                        <label class="form-control w-full max-w-md mt-2">
                            <div class="label">
                                <span class="label-text">Deskripsi</span>
                            </div>
                            <input name="deskripsi" type="text" value="{{ old('deskripsi') }}" placeholder=""
                                class="input input-bordered w-full max-w-md" />
                            @error('deskripsi')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label class="form-control w-full max-w-md mt-2">
                            <div class="label">
                                <span class="label-text">Jumlah</span>
                            </div>
                            <input name="jumlah" type="number" value="{{ old('jumlah') }}" placeholder=""
                                class="input input-bordered w-full max-w-md" />
                            @error('jumlah')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label class="form-control w-full max-w-md mt-2">
                            <div class="label">
                                <span class="label-text">File</span>
                            </div>
                            <input name="file" type="file" placeholder=""
                                class="file-input file-input-ghost input-bordered w-full max-w-md" />
                            @error('file')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label class="form-control w-full max-w-md mt-2">
                            <div class="label">
                                <span class="label-text">Cover</span>
                            </div>
                            <input name="cover" type="file" placeholder=""
                                class="file-input file-input-ghost input-bordered w-full max-w-md" />
                            @error('cover')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </label>
                        <button class="btn btn-success text-white mt-4 w-full max-w-md">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
