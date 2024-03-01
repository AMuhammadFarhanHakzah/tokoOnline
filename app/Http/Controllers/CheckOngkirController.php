<?php

namespace App\Http\Controllers;

use App\Models\kota;
use Illuminate\Http\Request;

class CheckOngkirController extends Controller
{
    public function getCities($id) {
        $kota = kota::where('id_provinsi', $id)->pluck('nama', 'id_kota');
        return response()->json($kota);
    }
}
