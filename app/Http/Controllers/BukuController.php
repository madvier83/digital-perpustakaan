<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $bukus = Buku::with('kategori')->orderBy("created_at", "desc")->get();

        $kategoris = Kategori::orderBy('created_at', 'desc')->get();
        $selectedKategori = $request->input('kategori_id');

        $bukus = Buku::when($selectedKategori, function ($query, $selectedKategori) {
            return $query->where('kategori_id', $selectedKategori);
        })->get();

        return view('buku.index', ['bukus' => $bukus, 'kategoris' => $kategoris, 'selectedKategori' => $selectedKategori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('created_at', 'desc')->get();
        return view('buku.create', ['kategoris' => $kategoris]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'file' => 'required|mimes:pdf,epub|max:2048',
            'cover' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('files');
        }

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('covers');
        }

        Buku::create($validated);

        return redirect('buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', ['buku' => $buku]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $kategoris = Kategori::orderBy('created_at', 'desc')->get();
        return view('buku.edit', ['buku' => $buku, 'kategoris' => $kategoris]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'file' => 'nullable|mimes:pdf,epub|max:2048',
            'cover' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('file')) {
            // Delete the old file if it exists
            if ($buku->file) {
                Storage::disk('public')->delete($buku->file);
            }

            // Store the new file
            $validated['file'] = $request->file('file')->store('files', 'public');
        }

        if ($request->hasFile('cover')) {
            // Delete the old cover if it exists
            if ($buku->cover) {
                Storage::disk('public')->delete($buku->cover);
            }

            // Store the new cover
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $buku->update($validated);

        return redirect('buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect('buku');
    }
}
