<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use App\Models\slideshow;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $title = "Homepage";
        $active = "home";
        $itemProduk = produk::orderBy('created_at', 'desc')->where('status', 'publish')->limit(6)->get();
        $itemPromo = produk::orderBy('created_at', 'desc')->where('status', 'publish')->whereNotNull('diskon')->limit(6)->get();
        $itemKategori = kategori::orderBy('nama_kategori', 'asc')->limit(6)->get();
        $itemSlide = slideshow::get();
        return view('homepage.index', compact('title', 'active', 'itemProduk', 'itemPromo', 'itemKategori', 'itemSlide'));
    }
    public function about()
    {
        $title = "Tentang Kami";
        $active = "about";
        return view('homepage.about', compact('title', 'active'));
    }
    public function kontak()
    {
        $title = "Kontak Kami";
        $active = "kontak";
        return view('homepage.kontak', compact('title', 'active'));
    }
    public function kategori()
    {
        $title = "Kategori Produk";
        $active = "kategori";
        return view('homepage.kategori', compact('title', 'active'));
    }
}
