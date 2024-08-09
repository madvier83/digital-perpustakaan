<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tabel Kategori') }}
            </h2>

            <a href="/kategori" class="btn btn-sm">Kembali</a>
        </div>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-xl font-bold mb-4">Tambah Kategori</h1>
                    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="form-control w-full max-w-md mt-2">
                            <div class="label">
                                <span class="label-text">Nama</span>
                            </div>
                            <input name="nama" type="text" value="{{ old('nama') }}" placeholder=""
                                class="input input-bordered w-full max-w-md" />
                            @error('nama')
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
