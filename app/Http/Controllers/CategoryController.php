<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $cari = request('search');
        // $category = DB::table('categories')
        //     ->where('kategori', 'LIKE', "%$cari%")
        //     ->paginate(5);

        $category = Category::latest()->paginate(5);
        if (request('search')) {
            $category = Category::where('kategori', 'like', '%' . request('search') . '%')->paginate(5);
        }

        $no = 5 * ($category->currentPage() - 1);
        return view('kategori.index', [
            'categories' => $category,
            'no' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'kategori' => 'required|min:3|max:20|unique:categories'
        ];
        // bikin pesan error
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'min' => ':attribute minimal harus 3 huruf',
            'max' => ':attribute maximal 20 huruf',
            'unique' => "Kategori $request->kategori telah tersedia!"
        ];
        // eksekusi fungsinya

        $validatedData = $request->validate($rules, $messages);

        Alert::success('Succesful', 'Data berhasil ditambahkan');

        Category::create($validatedData);
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $kategori)
    {
        return view('kategori.show', [
            'category' => $kategori
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $kategori)
    {
        return view('kategori.edit', [
            'category' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $kategori)
    {
        $rules = [
            'kategori' => 'required|min:3|max:20'
        ];
        // bikin pesan error
        $messages = [
            'required' => ':attribute tidak boleh kosong!',
            'min' => ':attribute minimal harus 3 huruf',
            'max' => ':attribute maximal 20 huruf'
        ];

        $validatedData = $request->validate($rules, $messages);
        if ($request->kategori == $kategori->kategori) {
            Alert::info('Informtation', "Tidak ada perubahan pada kategori $kategori->kategori");
            redirect('/kategori');
        } else {
            if (!in_array(Str::lower($request->kategori), Category::pluck('kategori')->map(function ($kategori) {
                return Str::lower($kategori);
            })->toArray())) {
                Alert::success('Succesful', 'Data berhasil di Update');
                Category::where('id', $kategori->id)
                    ->update($validatedData);
            } else {
                Alert::info('Information', "Kategori $request->kategori telah tersedia!");
                // redirect()->back() : berfungsi mengarahkan halaman yang sebelumnya di akses
                return redirect()->back();
            }
        }


        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $kategori)
    {
        Category::destroy($kategori->id);

        toast("Kategori <span class='fw-bold text-primary border-bottom'>$kategori->kategori</span> telah <span class='text-danger'>dihapus</span>", 'success');

        return redirect()->back();
    }
}
