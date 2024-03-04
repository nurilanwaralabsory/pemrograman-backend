<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Category::all();
        return view('buku.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'sampul' => 'required|mimes:jpg,png|max:500|mimes:jpg,png'
        ];
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'max' => ':attribute',
            'mimes' => 'ekstensi file tidak didukung, silahkan gunakan (.jpg/.png)',
        ];

        $request->validate($rules, $messages);

        $gambar = $request->sampul;
        // rename nama gambar
        $namaFile = time() . rand(100, 999) . "." . $gambar->getClientOriginalExtension();

        // pindahin gambar asli ke dalam folder publik
        $gambar->move('upload', $namaFile);

        Buku::create([
            'sampul' => $namaFile,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori
        ]);
        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', [
            'buku' => $buku
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $kategori = Category::all();
        return view('buku.edit', [
            'buku' => $buku,
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $rules = [
            'sampul' => 'required|mimes:jpg,png|max:500|mimes:jpg,png'
        ];
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'max' => ':attribute',
            'mimes' => 'ekstensi file tidak didukung, silahkan gunakan (.jpg/.png)',
        ];

        $request->validate($rules, $messages);

        if (!$request->sampul) {
            $buku->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'deskripsi' => $request->deskripsi,
                'kategori_id' => $request->kategori
            ]);
            return redirect('/buku');
        }
        // gimana kalau nama gambarnya sama sedangkan wujud gambarnya beda

        $gambar = $request->sampul;
        $namaFile = time() . rand(100, 999) . "." . $gambar->getClientOriginalExtension();
        $gambar->move('upload', $namaFile);

        $buku->update([
            'sampul' => $namaFile,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori
        ]);
        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->destroy($buku->id);
        // menghapus gambar
        $path = 'upload/' . $buku->sampul;
        if (File::exists($path)) {
            File::delete($path);
        }
        return redirect('/buku');
    }
}
