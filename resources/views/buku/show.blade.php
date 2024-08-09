<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Perpustakaan') }}
            </h2>

            <a href="{{ url()->previous() }}"class="btn btn-sm">Kembali</a>
        </div>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-xl font-bold mb-4">Detail Buku</h1>
                    <div>

                        <label class="form-control w-full max-w-md mt-2">
                            <div class="label">
                                <span class="label-text">Judul</span>
                            </div>
                            <input readonly name="judul" type="text" value="{{ old('judul', $buku->judul) }}" placeholder=""
                                class="input input-bordered w-full max-w-md" />
                            @error('judul')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label class="form-control w-full max-w-md mt-2">
                            <div class="label">
                                <span class="label-text">Kategori</span>
                            </div>
                            <input readonly name="kategori" type="text" value="{{ old('kategori', $buku->kategori->nama) }}"
                                placeholder="" class="input input-bordered w-full max-w-md" />
                            @error('kategori')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label class="form-control w-full max-w-md mt-2">
                            <div class="label">
                                <span class="label-text">Deskripsi</span>
                            </div>
                            <input readonly name="deskripsi" type="text" value="{{ old('deskripsi', $buku->deskripsi) }}"
                                placeholder="" class="input input-bordered w-full max-w-md" />
                            @error('deskripsi')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <label class="form-control w-full max-w-md mt-2">
                            <div class="label">
                                <span class="label-text">Jumlah</span>
                            </div>
                            <input readonly name="jumlah" type="number" value="{{ old('jumlah', $buku->jumlah) }}"
                                placeholder="" class="input input-bordered w-full max-w-md" />
                            @error('jumlah')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                        <a href="{{ route('buku-saya.index') }}" class="btn mt-4 w-full max-w-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
