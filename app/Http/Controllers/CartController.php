<?php

namespace App\Http\Controllers;

use App\Models\alamatpengiriman;
use App\Models\cart;
use App\Models\cartdetail;
use App\Models\produk;
use App\Models\provinsi;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemCart = cart::where('id_user', auth()->user()->id_user)
                        ->where('status_cart', 'proses')
                        ->first();

        if($itemCart) {
            $data = array(
                'title' => 'Shopping Cart',
                'active' => 'cart',
                'itemCart' => $itemCart,
            );
                return view('cart.index', $data)->with('no', 1);
        }else{
            echo '<script>alert("Anda belum memiliki keranjang. Silahkan belanja terlebih dahulu") </script>';
            echo "<script>window.location = '/' </script>";
        }

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function kosongkan($id) {
        $itemCart = cart::findOrFail($id);

        $itemCartDetail = cartdetail::where('id_cart', $id)->get();

        foreach ($itemCartDetail as $cartDetail) {
            $itemDetail = cartdetail::where('id_produk', $cartDetail->id_produk)->first();
            $itemProduk = produk::where('id_produk', $cartDetail->id_produk)->first();
            produk::where('id_produk', $itemProduk->id_produk)->update([
                'qty' => $itemProduk->qty + $itemDetail->qty
            ]);
        }

        $itemCart->cartdetail()->delete();
        $itemCart->updateTotal($itemCart, '-', $itemCart->subtotal);
        return back()->with('Success', 'Cart berhasil dikosongkan');
    }

    public function checkout(Request $request) {
        
        $itemUser = auth()->user();
        $itemCart = cart::where('id_user', $itemUser->id_user)
                        ->where('status_cart', 'proses')
                        ->first();

        $itemAlamatPengiriman = alamatpengiriman::where('id_user', $itemUser->id_user)
                                                ->where('status', '1')
                                                ->first();

        $produk = array();
        foreach($itemCart->cartdetail as $detail => $key) {
            $produk[$detail] = produk::where('id_produk', $key->id_produk)->first()->berat*$key->qty;
        }

        $provinsi = provinsi::pluck('nama', 'id_provinsi');

        if($itemCart) {
            $data = array(
                'title' => 'Checkout',
                'itemCart' => $itemCart,
                'active' => 'cart',
                'itemAlamatPengiriman' => $itemAlamatPengiriman,
                'provinsi' => $provinsi,
                'produk' => array_sum($produk),
            );
            return view('cart.checkout', $data)->with('no', 1);
        } else {
            return abort('404');
        }
    }
}
