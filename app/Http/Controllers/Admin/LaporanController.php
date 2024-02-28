<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index() {
        $title = "Form Laporan Penjualan";
        return view("laporan.index", compact('title'));
    }
    
    public function proses(Request $request) {
        $title = 'Laporan Penjualan';
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $bulan_transaksi = date('Y-m', strtotime($request->tahun. '-' .$request->bulan));
        $itemTransaksi = order::whereHas('cart', function ($q) use ($bulan_transaksi) {
            $q->where('status_pembayaran', 'sudahdibayar');
            $q->where('created_at', 'like', $bulan_transaksi.'%');
        })->get();



        return view('laporan.proses', compact('title', 'bulan','tahun', 'bulan_transaksi', 'itemTransaksi'))->with('no', 1);
    }
}
