<?php

namespace App\Http\Controllers;

use App\Models\kota;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckOngkirController extends Controller
{
    public function getCities($id) {
        $kota = kota::where('id_provinsi', $id)->pluck('nama', 'id_kota');
        return response()->json($kota);
    }

    public function check_ongkir(Request $request) {
        $cost = RajaOngkir::ongkosKirim([
            'origin'            => $request->city_origin,
            'originType'        => 'city',
            'destination'       => $request->city_destination,
            'destinationType'   => 'city',
            'weight'            => $request->weight,
            'courier'           => $request->courier,
        ])->get();

        return response()->json($cost);
    }
}
