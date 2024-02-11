<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index() {
        $title = "Form Laporan Penjualan";
        return view("laporan.index", compact('title'));
    }
    
    public function proses() {
        $title = 'Laporan Penjualan';
        return view('laporan.proses', compact('title'));
    }
}
