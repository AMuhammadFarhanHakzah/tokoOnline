<?php

namespace App\Http\Controllers;

use App\Models\alamatpengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlamatPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $itemAlamatPengiriman = alamatpengiriman::where('id_user', auth()->user()->id_user)->paginate(10);
        $title = 'Alamat Pengiriman';
        $active = 'cart';

        return view('alamatpengiriman.index', compact('title', 'active', 'itemAlamatPengiriman'))->with('no', ($request->input('page', 1) - 1) * 10);
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
            'nama_penerima' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kodepos' => 'required',

        ]);

        $itemUser = Auth::user()->id_user;
        $inputan = $request->all();
        $inputan['id_user'] = $itemUser;
        $inputan['status'] = '1';
        $itemAlamatPengiriman = alamatpengiriman::create($inputan);

        alamatpengiriman::where('id_alamat_pengiriman', '!=', $itemAlamatPengiriman->id_alamat_pengiriman)
                        ->update(['status' => '2']);
        return back()->with('success', 'Alamat pengiriman berhasil disimpan');
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
        $itemAlamatPengiriman = alamatpengiriman::findOrFail($id);
        $itemAlamatPengiriman->update(['status' => '1']);
        alamatpengiriman::where('id_alamat_pengiriman', '!=', $id)->update(['status' => '2']);

        return back()->with('Success', 'Data berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
