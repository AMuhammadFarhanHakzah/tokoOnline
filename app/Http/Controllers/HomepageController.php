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

        if(auth()->user()) {
            if(auth()->user()->role === 'admin') {
                return redirect('/admin');
            }
        }

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

    public function produkDetail($slug) {
        
        $itemProduk = produk::where('slug_produk', $slug)
                            ->where('status', 'publish')
                            ->first();


        if($itemProduk) {
            $title = $itemProduk->nama_produk;
            $active = 'home';
            $itemProduk = $itemProduk;
        

        return view('homepage.produkDetail', compact('title', 'active', 'itemProduk'));
        }
    }

    public function kategori() {
        $title = 'Kategori Produk';
        $active = 'kategori';
        $itemKategori = kategori::orderBy('nama_kategori', 'asc')->get();
        $itemProduk = produk::orderBy('created_at', 'desc')->get();

        return view('homepage.kategori', compact('title', 'active', 'itemKategori', 'itemProduk'));
    }

    public function kategoribyslug($slug) {
        $itemKategori = kategori::where('slug_kategori', $slug)
                                ->orderBy('nama_kategori', 'asc')
                                ->first();
        $itemListKategori = kategori::orderBy('nama_kategori', 'asc')->get();
        
        if($itemKategori) {
            $title = $itemKategori->nama_kategori;
            $active = 'home';
            $itemKategori = $itemKategori;
            $itemListKategori = $itemListKategori;

            return view('homepage.kategori_produk', compact('title', 'active', 'itemKategori', 'itemListKategori'));
        } else {
            return abort(404);
        }
        
    }
}
