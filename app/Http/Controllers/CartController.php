<?php

namespace App\Http\Controllers;

use App\Models\cart;
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
                'itemCart' => $itemCart
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
}
