<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    /**
     * ======================================
     * LIST PRODUK ADMIN
     * ======================================
     */
    public function index(Request $request)
    {
        $query = Produk::query();

        // =========================
        // SEARCH PRODUK
        // =========================
        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {

                $q->where('nama_produk', 'like', '%' . $request->search . '%')
                  ->orWhere('brand', 'like', '%' . $request->search . '%')
                  ->orWhere('kategori', 'like', '%' . $request->search . '%');

            });

        }

        // =========================
        // FILTER KATEGORI
        // =========================
        if ($request->filled('kategori')) {

            $query->where('kategori', $request->kategori);

        }

        // =========================
        // FILTER BRAND
        // =========================
        if ($request->filled('brand')) {

            $query->where('brand', $request->brand);

        }

        // =========================
        // SORTING
        // =========================
        if ($request->filled('sort')) {

            switch ($request->sort) {

                case 'stok':
                    $query->orderBy('stok', 'asc');
                    break;

                case 'mahal':
                    $query->orderBy('harga', 'desc');
                    break;

                case 'murah':
                    $query->orderBy('harga', 'asc');
                    break;

                case 'lama':
                    $query->oldest();
                    break;

                default:
                    $query->latest();
                    break;
            }

        } else {

            $query->latest();

        }



        // =========================
        // PAGINATION
        // =========================
        $produks = $query->paginate(10)->withQueryString();



        // =========================
        // STATISTIK DASHBOARD
        // =========================
        $totalProduk = Produk::count();

        $totalStok = Produk::sum('stok');

        $produkHabis = Produk::where('stok', '<=', 5)->count();



        return view('admin.produk.index', compact(
            'produks',
            'totalProduk',
            'totalStok',
            'produkHabis'
        ));
    }

    /**
     * ======================================
     * FORM TAMBAH PRODUK
     * ======================================
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * ======================================
     * SIMPAN PRODUK
     * ======================================
     */
    public function store(Request $request)
    {
        $request->validate([

            'nama_produk' => 'required|string|max:255',

            'harga' => 'required|numeric|min:0',

            'stok' => 'required|numeric|min:0',

            'kategori' => 'required|string|max:255',

            'brand' => 'required|string|max:255',

            'deskripsi' => 'nullable|string',

            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);


        // =========================
        // UPLOAD GAMBAR
        // =========================
        $gambar = null;

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');

            $gambar = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(public_path('produk'), $gambar);

        }



        // =========================
        // SIMPAN DATABASE
        // =========================
        Produk::create([

            'nama_produk' => $request->nama_produk,

            'harga' => $request->harga,

            'stok' => $request->stok,

            'kategori' => $request->kategori,

            'brand' => $request->brand,

            'deskripsi' => $request->deskripsi,

            'gambar' => $gambar,

        ]);



        return redirect('/admin/produk')
            ->with('success', 'Produk berhasil ditambahkan 🐾');
    }






    /**
     * ======================================
     * FORM EDIT PRODUK
     * ======================================
     */
        public function edit(Request $request, $id)
        {
            $produk = Produk::findOrFail($id);

            $page = $request->page ?? 1;

            return view('admin.produk.edit', compact(
                'produk',
                'page'
            ));
        }

    /**
     * ======================================
     * UPDATE PRODUK
     * ======================================
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'nama_produk' => 'required|string|max:255',

            'harga' => 'required|numeric|min:0',

            'stok' => 'required|numeric|min:0',

            'kategori' => 'required|string|max:255',

            'brand' => 'required|string|max:255',

            'deskripsi' => 'nullable|string',

            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);


        $produk = Produk::findOrFail($id);



        // =========================
        // DATA UPDATE
        // =========================
        $data = [

            'nama_produk' => $request->nama_produk,

            'harga' => $request->harga,

            'stok' => $request->stok,

            'kategori' => $request->kategori,

            'brand' => $request->brand,

            'deskripsi' => $request->deskripsi,

        ];



        // =========================
        // UPDATE GAMBAR
        // =========================
        if ($request->hasFile('gambar')) {

            // HAPUS GAMBAR LAMA
            if (
                $produk->gambar &&
                File::exists(public_path('produk/' . $produk->gambar))
            ) {

                File::delete(public_path('produk/' . $produk->gambar));

            }



            // UPLOAD GAMBAR BARU
            $file = $request->file('gambar');

            $gambarBaru = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(public_path('produk'), $gambarBaru);

            $data['gambar'] = $gambarBaru;

        }



        // =========================
        // UPDATE DATABASE
        // =========================
        $produk->update($data);

        $page = $request->page ?? 1;

        return redirect('/admin/produk?page=' . $page)
            ->with('success', 'Produk berhasil diupdate ✨');
    }

    /**
     * ======================================
     * HAPUS PRODUK
     * ======================================
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);



        // =========================
        // HAPUS FILE GAMBAR
        // =========================
        if (
            $produk->gambar &&
            File::exists(public_path('produk/' . $produk->gambar))
        ) {

            File::delete(public_path('produk/' . $produk->gambar));

        }



        // =========================
        // HAPUS DATABASE
        // =========================
        $produk->delete();



        return back()
            ->with('success', 'Produk berhasil dihapus 🗑️');
    }
}