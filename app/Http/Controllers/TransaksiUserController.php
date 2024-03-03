<?php

namespace App\Http\Controllers;

use App\Models\alamatpengiriman;
use App\Models\cart;
use App\Models\order;
use Illuminate\Http\Request;

class TransaksiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $itemUser = auth()->user();

        $itemOrder = order::whereHas('cart', function($q) use ($itemUser) {
            $q->where('status_cart', 'checkout');
            $q->where('id_user', $itemUser->id_user);
        })->orderBy('created_at', 'desc')->paginate(20);

        $data = array(
            'title' => 'Data transaksi',
            'active' => 'riwayatTransaksi',
            'itemOrder' => $itemOrder,
            'itemUser' => $itemUser
        );

        return view('transaksiUser.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
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
        $itemUser = auth()->user();
        $itemCart = cart::where('status_cart', 'proses')
                        ->where('id_user', $itemUser->id_user)
                        ->first();
        if($itemCart) {
            $itemAlamatPengiriman = alamatpengiriman::where('id_user', $itemUser->id_user)
                                                    ->where('status', '1')
                                                    ->first();
            if($itemAlamatPengiriman) {
                $inputanOrder['id_cart'] = $itemCart->id_cart;
                $inputanOrder['nama_penerima'] = $itemAlamatPengiriman->nama_penerima;
                $inputanOrder['no_tlp'] = $itemAlamatPengiriman->no_tlp;
                $inputanOrder['alamat'] = $itemAlamatPengiriman->alamat;
                $inputanOrder['provinsi'] = $itemAlamatPengiriman->provinsi;
                $inputanOrder['kota'] = $itemAlamatPengiriman->kota;
                $inputanOrder['kecamatan'] = $itemAlamatPengiriman->kecamatan;
                $inputanOrder['kelurahan'] = $itemAlamatPengiriman->kelurahan;
                $inputanOrder['kodepos'] = $itemAlamatPengiriman->kodepos;
                $itemOrder = order::create($inputanOrder);

                $itemCart->update(['status_cart' => 'checkout']);
                return redirect()->route('transaksiUser.index')->with('Success', 'Order berhasil disimpan, silakan segera membayar');

            } else{
                return back()->with('error', 'Alamat pengiriman belum diisi');
            }
        } else{
            return abort('404');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $itemUser = auth()->user();
        $itemOrder = order::where('id_order', $id)
                          ->whereHas('cart', function($q) use ($itemUser) {
                            $q->where('id_user', $itemUser->id_user);
                          })->first();

        if($itemOrder) {
            $data = array(
                'title' => 'Detail Transaksi',
                'active' => 'transaksi',
                'itemUser' => $itemUser,
                'itemOrder' => $itemOrder,
            );
            return view('transaksiUser.show', $data)->with('no', 1);
        } else {
            return abort('404');
        }

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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ekspedisi' => 'required'
        ]);

        $inputan = $request->all();
        $inputan['ekspedisi'] = $request->ekspedisi;
        $itemOrder = cart::findOrFail($id);
        $itemOrder->update($inputan);
        return back()->with('ekspedisi', $request->ongkir);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
