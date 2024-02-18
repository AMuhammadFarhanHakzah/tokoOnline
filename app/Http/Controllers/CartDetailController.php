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

        if ($itemProduk->qty <= 0) {
            return redirect()->back()->with('error', 'Stock Habis');
        }

        $cart = cart::where('id_user', $itemUser->id_user)
            ->where('status_cart', 'proses')
            ->first();

        if ($cart) {
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
        $harga = $itemProduk->harga - (($itemProduk->diskon / 100) * $itemProduk->harga);
        $subtotal = ($qty * $harga);

        if ($cekDetail) {
            produk::where('id_produk', $itemProduk->id_produk)->update([
                'qty' => $itemProduk->qty - 1
            ]);

            //update detail di cart_detail
            $cekDetail->updateDetail($cekDetail, '+', $qty, $harga);
            //update total di cart
            $cekDetail->cart->updateTotal($cekDetail->cart, '+', $subtotal);
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

            $itemDetail->cart->updateTotal($itemDetail->cart, '+', $subtotal);
        }

        return redirect()->route('cart.index')->with('Success', 'Produk berhasil ditambahkan ke keranjang');
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
        //     $inputanCart['no_invoice'] = 'KTP' . str_pad(($no_invoice + 1), '3', '0', STR_PAD_LEFT);
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
        //         $cekDetail->cart->updateTotal($cekDetail->cart, '+', $subtotal);
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
        //         $itemDetail->cart->updateTotal($itemDetail->cart, '+', $subtotal);
        //     }
        //     return redirect()->route('cart.index')->with('Success', 'Produk berhasil ditambahkan ke keranjang');

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
        $itemDetail = cartdetail::findOrFail($id);
        $param = $request->param;
        $cekProduk = produk::where('id_produk', $itemDetail->id_produk)->first();

        if ($param == 'tambah') {
            if ($cekProduk->qty != 0) {
                produk::where('id_produk', $itemDetail->id_produk)->update([
                    'qty' => $cekProduk->qty - 1,
                ]);

                $qty = 1;
                $harga = $cekProduk->harga - ($cekProduk->harga * ($cekProduk->diskon / 100));
                $subtotal = ($qty * $harga);
                $itemDetail->updateDetail($itemDetail, '+', $qty, $harga);
                $itemDetail->cart->updateTotal($itemDetail->cart, '+', $subtotal);
                return back()->with('Success', 'Item berhasil diupdate');
            } else {
                return back()->with('error', 'Stock tidak mencukupi');
            }
        } 
        if($param == 'kurang') {
            if ($itemDetail->qty > 1) {
                produk::where('id_produk', $itemDetail->id_produk)->update([
                    'qty' => $cekProduk->qty + 1,
                ]);

                $qty = 1;
                $harga = $cekProduk->harga - ($cekProduk->harga * ($cekProduk->diskon / 100));
                $subtotal = ($qty * $harga);
                $itemDetail->updateDetail($itemDetail, '-', $qty, $harga);
                $itemDetail->cart->updateTotal($itemDetail->cart, '-', $qty, $harga);
                return back()->with('Success', 'Item berhasil diupdate');
            } else {
                return back()->with('error', 'Kuantiti harus ada, jika anda ingin menghapus silahkan klik tombol hapus');
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $itemDetail = cartdetail::findOrFail($id);

        $itemProduk = produk::findOrFail($itemDetail->id_produk);

        produk::where('id_produk', $itemDetail->id_produk)->update([
            'qty' => $itemProduk->qty + $itemDetail->qty
        ]);

        $itemDetail->cart->updateTotal($itemDetail->cart, '-', $itemDetail->subtotal);

        if($itemDetail->delete()) {
            return back()->with('Success', 'Item berhasil dihapus');
        } else {
            return back()->with('error', 'Item gagal dihapus');
        }
        // if($itemDetail) {
        //     $itemDetail->delete();
            
        //     produk::where('qty', $itemProduk->qty)->update([
        //         'qty' => $itemProduk->qty + 1
        //     ]);

        //     return redirect()->back()->with('Success', 'Produk telah dihapus');
        // } else {
        //     return redirect()->back()->with('error', 'Produk tidak ada');
        // }
    }
}
