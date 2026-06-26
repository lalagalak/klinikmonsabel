<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * 📦 HALAMAN PETSHOP CUSTOMER
     */
    public function index(Request $request)
    {
        $query = Produk::query();

        // 🔍 SEARCH PRODUK
        if ($request->filled('search')) {

            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        // 🟣 FILTER KATEGORI
        if ($request->filled('kategori')) {

            $query->where('kategori', $request->kategori);
        }

        // 🟡 FILTER BRAND
        if ($request->filled('brand')) {

            $query->whereIn('brand', $request->brand);
        }

        // 💰 FILTER HARGA MIN
        if ($request->filled('min')) {

            $query->where('harga', '>=', $request->min);
        }

        // 💰 FILTER HARGA MAX
        if ($request->filled('max')) {

            $query->where('harga', '<=', $request->max);
        }

        // 🔄 SORTING
        if ($request->filled('sort')) {

            switch ($request->sort) {

                case 'murah':
                    $query->orderBy('harga', 'asc');
                    break;

                case 'mahal':
                    $query->orderBy('harga', 'desc');
                    break;

                case 'stok':
                    $query->orderBy('stok', 'desc');
                    break;

                case 'lama':
                    $query->oldest();
                    break;

                default:
                    $query->latest();
                    break;
            }

        } else {

            // DEFAULT TERBARU
            $query->latest();
        }

        /**
         * 📄 PAGINATION
         * 10 PRODUK / HALAMAN
         */
        $produk = $query->paginate(10)->withQueryString();

            /*
            |--------------------------------------------------------------------------
            | PRODUK TRENDING
            |--------------------------------------------------------------------------
            |
            | Tidak ikut terfilter saat user mencari produk
            |
            */

            $trendingProduk = Produk::latest()
                ->take(4)
                ->get();

            return view(
                'petshop.index',
                compact(
                    'produk',
                    'trendingProduk'
                )
            );
    }

    /**
     * ➕ FORM TAMBAH PRODUK
     */
    public function create()
    {
        return view('petshop.create');
    }

    /**
     * 💾 SIMPAN PRODUK
     */
    public function store(Request $request)
    {
        $request->validate([

            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|string|max:100',
            'brand' => 'nullable|string|max:100',

        ]);

        Produk::create([

            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'brand' => $request->brand,

        ]);

        return redirect('/petshop')
            ->with('success', 'Produk berhasil ditambahkan 🐾');
    }

    /**
     * ✏️ FORM EDIT PRODUK
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        return view('petshop.edit', compact('produk'));
    }

    /**
     * 🔄 UPDATE PRODUK
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|string|max:100',
            'brand' => 'nullable|string|max:100',

        ]);

        $produk = Produk::findOrFail($id);

        $produk->update([

            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'brand' => $request->brand,

        ]);

        return redirect('/petshop')
            ->with('success', 'Produk berhasil diupdate ✨');
    }

    /**
     * ❌ HAPUS PRODUK
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        $produk->delete();

        return redirect('/petshop')
            ->with('success', 'Produk berhasil dihapus');
    }

    /**
     * 📦 RESTOCK PRODUK
     */
    public function restock(Request $request, $id)
    {
        $request->validate([

            'jumlah' => 'required|numeric|min:1'

        ]);

        $produk = Produk::findOrFail($id);

        $produk->stok += $request->jumlah;

        $produk->save();

        return back()
            ->with('success', 'Stok berhasil ditambahkan');
    }
}