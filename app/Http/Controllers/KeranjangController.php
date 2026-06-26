<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * =========================
     * HALAMAN KERANJANG
     * =========================
     */
    public function index()
    {
        $keranjang = session()->get('cart', []);

        return view('keranjang.index', compact('keranjang'));
    }



    /**
     * =========================
     * TAMBAH KE KERANJANG
     * =========================
     */
    public function tambah(Request $request)
    {
        $id = $request->produk_id;
        $qty = $request->qty;

        $produk = Produk::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['qty'] += $qty;

        } else {

            $cart[$id] = [

                "nama"   => $produk->nama_produk,
                "harga"  => $produk->harga,
                "qty"    => $qty,
                "gambar" => $produk->gambar

            ];
        }

        session()->put('cart', $cart);

        return back()
            ->with('cart_success', true);
    }



    /**
     * =========================
     * HAPUS KERANJANG
     * =========================
     */
    public function hapus($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart', $cart);
        }

        return redirect('/keranjang')
            ->with('success', 'Produk berhasil dihapus');
    }

    /**
     * =========================
     * TAMBAH QTY
     * =========================
     */
    public function tambahQty($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $produk = Produk::find($id);

            if ($produk && $cart[$id]['qty'] < $produk->stok) {

                $cart[$id]['qty']++;

                session()->put('cart', $cart);

                return back()->with(
                    'success',
                    'Jumlah produk ditambah'
                );
            }

            return back()->with(
                'error',
                'Stok tidak mencukupi'
            );
        }

        return back();
    }

    /**
     * =========================
     * KURANG QTY
     * =========================
     */
    public function kurangQty($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            if ($cart[$id]['qty'] > 1) {

                $cart[$id]['qty']--;

            } else {

                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return back()->with(
            'success',
            'Jumlah produk diperbarui'
        );
    }

    /**
     * =========================
     * KOSONGKAN KERANJANG
     * =========================
     */
    public function kosongkan()
    {
        session()->forget('cart');

        return back()->with(
            'success',
            'Keranjang berhasil dikosongkan'
        );
    }


    /**
     * =========================
     * HALAMAN CHECKOUT
     * =========================
     */
    public function checkout()
    {
        if (!auth()->check()) {

            return redirect('/login')
                ->with('error', 'Silakan login terlebih dahulu');
        }

        $cart = session()->get('cart', []);

        if (!$cart) {

            return redirect('/keranjang')
                ->with('error', 'Keranjang masih kosong!');
        }

        $total = 0;

        foreach ($cart as $item) {

            $total += $item['harga'] * $item['qty'];
        }

        return view('checkout.index', compact('cart', 'total'));
    }



    /**
     * =========================
     * PROSES CHECKOUT
     * =========================
     */
    public function prosesCheckout(Request $request)
    {

        /**
         * =========================
         * VALIDASI
         * =========================
         */
        $request->validate([

            'nohp'           => 'required',
            'alamat'         => 'required',
            'pengiriman'     => 'required',
            'metode'         => 'required',

            'bukti_transfer' =>
                'required|image|mimes:jpg,jpeg,png|max:2048',

        ]);



        /**
         * =========================
         * AMBIL CART
         * =========================
         */
        $cart = session()->get('cart', []);

        if (!$cart) {

            return redirect('/keranjang')
                ->with('error', 'Keranjang kosong!');
        }



        /**
         * =========================
         * HITUNG SUBTOTAL
         * =========================
         */
        $subtotal = 0;

        foreach ($cart as $item) {

            $subtotal += $item['harga'] * $item['qty'];
        }



        /**
         * =========================
         * ONGKIR
         * =========================
         */
        $ongkir = 0;

        if ($request->pengiriman == 'Kurir Klinik') {

            $ongkir = 15000;

            $alamat = strtolower($request->alamat);

            if (!str_contains($alamat, 'medan')) {

                return back()
                    ->with('error',
                        'Maaf, pengiriman hanya area Medan.')
                    ->withInput();
            }
        }



        /**
         * =========================
         * TOTAL AKHIR
         * =========================
         */
        $total = $subtotal + $ongkir;



        /**
         * =========================
         * UPLOAD BUKTI TRANSFER
         * =========================
         */
        $bukti = null;

        if ($request->hasFile('bukti_transfer')) {

            $bukti = $request->file('bukti_transfer')
                        ->store('bukti-transfer', 'public');
        }



        /**
         * =========================
         * SIMPAN TRANSAKSI
         * =========================
         */
        $transaksi = Transaksi::create([

            'nama_customer'     => auth()->user()->name,
            'total'             => $total,

            'no_hp'             => $request->nohp,
            'alamat'            => $request->alamat,
            'catatan'           => $request->catatan,

            'pengiriman'        => $request->pengiriman,
            'metode_pembayaran' => $request->metode,

            'ongkir'            => $ongkir,

            'bukti_transfer'    => $bukti,

            // STATUS AWAL
            'status'            => 'Pending',

        ]);



        /**
         * =========================
         * DETAIL TRANSAKSI
         * =========================
         */
        foreach ($cart as $id => $item) {

            DetailTransaksi::create([

                'transaksi_id' => $transaksi->id,
                'produk_id'    => $id,
                'qty'          => $item['qty'],
                'subtotal'     => $item['harga'] * $item['qty']

            ]);



            /**
             * =========================
             * KURANGI STOK
             * =========================
             */
            $produk = Produk::find($id);

            if ($produk) {

                $produk->stok -= $item['qty'];

                $produk->save();
            }
        }



        /**
         * =========================
         * KOSONGKAN CART
         * =========================
         */
        session()->forget('cart');



        /**
         * =========================
         * REDIRECT SUCCESS
         * =========================
         */
        return redirect('/checkout/success/' . $transaksi->id)
            ->with('success', 'Pesanan berhasil dibuat 💜');
    }
}