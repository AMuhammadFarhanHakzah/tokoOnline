<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Data Transaksi';
        $itemUser = auth()->user();
        $itemOrder = order::whereHas('cart', function($q) use ($itemUser){
            $q->where('status_cart', 'checkout');
        })->orderBy('created_at', 'desc')
          ->paginate(20);

        return view('transaksi.index', compact('title', 'itemUser', 'itemOrder'))->with('no', ($request->input('page', 1) - 1) * 20);
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
        $title = 'Detail Transaksi';
        $itemOrder = order::findOrFail($id);
        

        return view('transaksi.show', compact('title', 'itemOrder'))->with('no', 1);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Transaksi';
        return view('transaksi.edit', compact('title'));
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
