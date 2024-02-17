<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\cartdetail;
use App\Models\produk;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
        $this->validate($request, [
            'id_produk' => 'required',
        ]);

        $itemUser = auth()->user();
        $itemProduk = produk::findOrFail($request->id_produk);
        
        if($itemProduk->qty <= 0){
            return redirect()->back()->with('error', 'Stock Habis');
        } 

        $cart = cart::where('id_user', $itemUser->id_user)
                    ->where('status', 'proses')
                    ->first();
        
        if($cart) {
            $itemCart = $cart;
        } else {
            $no_invoice = cart::where('id_user', $itemUser->id_user)->count();
            $inputanCart['id_user'] = $itemUser->id_user;
            $inputanCart['no_invoice'] = 'INV' . str_pad(($no_invoice + 1), '3', '0', STR_PAD_LEFT);
            $inputanCart['status_cart'] = 'proses';
            $inputanCart['status_pembayaran'] = 'belumdibayar';
            $inputanCart['status_pengiriman'] = 'belum';
            $itemCart = cart::create($inputanCart);
        }

        $cekDetail = cartdetail::where('id_cart', $itemCart->id_cart)
                               ->where('id_produk', $itemProduk->id_produk)
                               ->first();
        $qty = 1;
        $harga = $itemProduk->harga - (($itemProduk->diskon/100) * $itemProduk->harga);
        $subtotal = ($qty * $harga);

        if($cekDetail) {
            produk::where('id_produk', $itemProduk->id_produk)->update([
                'qty' => $itemProduk->qty - 1
            ]);

            //update detail di cart_detail
            $cekDetail->updateDetail($cekDetail, '+', $qty, $harga);
            //update total di cart
            $cekDetail->cart->updatetotal($cekDetail->cart, '+', $subtotal);
        } else {
            $inputan = $request->all();
            $inputan['id_cart'] = $itemCart->id_cart;
            $inputan['id_produk'] = $itemProduk->id_produk;
            $inputan['qty'] = $qty;
            $inputan['harga'] = $harga;
            $inputan['subtotal'] = ($qty * $harga);
            $itemDetail = cartdetail::create($inputan);

            produk::where('id_produk', $itemProduk->id_produk)->update([
                'qty' => $itemProduk->qty - 1
            ]);

            $itemDetail->cart->updatetotal($itemDetail->cart, '+', $subtotal);
        }
        // AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
        // $this->validate($request, [
        //     'id_produk' => 'required',
        // ]);

        // $itemUser = auth()->user();

        // $itemProduk = produk::findOrFail($request->id_produk);

        // if($itemProduk->qty <= 0)  {
        //     return back()->with('error', 'Stock Habis');
        // } 

        // $cart = cart::where('id_user', $itemUser->id_user)
        //             ->where('status_cart', 'proses')
        //             ->first();

        // if($cart) {
        //     $itemCart = $cart;
        // } else {
        //     $no_invoice = cart::where('id_user', $itemUser->id_user)->count();
        //     $inputanCart['id_user'] = $itemUser->id_user;
        //     $inputanCart['no_invoice'] = 'INV' . str_pad(($no_invoice + 1), '3', '0', STR_PAD_LEFT);
        //     $inputanCart['status_cart'] = 'proses';
        //     $inputanCart['status_pembayaran'] = 'belumdibayar';
        //     $inputanCart['status_pengiriman'] = 'belum';
        //     $itemCart = cart::create($inputanCart);
        // }
        //     $cekDetail = cartdetail::where('id_cart', $itemCart->id_cart)
        //                             ->where('id_produk', $itemProduk->id_produk)
        //                             ->first();
        //     $qty = 1;
        //     $harga = $itemProduk->harga - (($itemProduk->diskon / 100) * $itemProduk->harga);
        //     $subtotal = ($qty * $harga);
            
        //     if($cekDetail) {
        //         produk::where('id_produk', $cekDetail->id_produk)->update([
        //             'qty' => $itemProduk->qty - 1,
        //         ]);
                
        //         //update detail di table cart_detail
        //         $cekDetail->updateDetail($cekDetail, '+', $qty, $harga);
        //         //update subtotal dan total di table cart
        //         $cekDetail->cart->updatetotal($cekDetail->cart, '+', $subtotal);
        //     } else {
        //         $inputan = $request->all();
        //         $inputan['id_cart'] = $itemCart->id_cart;
        //         $inputan['id_produk'] = $itemProduk->id_produk;
        //         $inputan['qty'] = $qty;
        //         $inputan['harga'] = $harga;
        //         $inputan['subtotal'] = ($qty * $harga);
        //         $itemDetail = cartdetail::create($inputan);

        //         produk::where('id_produk', $itemProduk->id_produk)->update([
        //             'qty' => $itemProduk->qty -1,
        //         ]);
                
        //         //update subtotal dan total di table cart
        //         $itemDetail->cart->updatetotal($itemDetail->cart, '+', $subtotal);
        //     }

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
}
