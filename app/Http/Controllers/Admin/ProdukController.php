<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\foto_produk;
use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Produk";
        $items = produk::paginate(10);
        $itemKategori = kategori::orderBy('nama_kategori', 'asc')->get();
        return view("produk.index", compact('title', 'items', 'itemKategori'));
    }


    public function cari(Request $request){
        $title = 'Cari Produk';
        $cari = $request->key;
        $items = produk::where('kode_produk', 'LIKE', '%'.$cari.'%')
                        ->orWhere('nama_produk', 'LIKE', '%'.$cari.'%')
                        ->orWhere('status', 'LIKE', '%'.$cari.'%')
                        ->paginate(10);

        return view('produk.index', compact('title', 'items', 'cari'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Form Produk';
        $itemkategori = kategori::orderBy('nama_kategori', 'asc')->get();
        return view('produk.create', compact('title', 'itemkategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kategori' => 'required',
            'kode_produk' => 'required|unique:produk',
            'nama_produk' => 'required',
            'slug_produk' => 'required',
            'deskripsi_produk' => 'required',
            'qty' => 'required|numeric',
            'satuan' => 'required',
            'harga' => 'required|numeric',
            'status' => 'required',
            'diskon' => 'numeric',
        ]);

        $inputanProduk = $request->all();
        $inputanProduk['slug_produk'] = Str::slug($request->slug_produk);

        produk::create($inputanProduk);
        
        return redirect()->route('produk.index')->with('Success', 'Data produk anda berhasil disimpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Detail Produk';
        $detailProduk = produk::findOrFail($id);
        $fotoProduk = foto_produk::where('id_produk', $id)->get();
        return view('produk.show', compact('title', 'detailProduk', 'fotoProduk'));
    }

    public function store_foto(Request $request) {
        $this->validate($request, [
            'foto_produk' => 'required'
        ]);

        $inputanFoto = $request->all();

        $foto_produk = "";

        if($request->hasFile('foto_produk')) {
            $image = $request->foto_produk;
            $foto_produk = time() . $image->getClientOriginalName();
            $image->move('upload/foto_produk', $foto_produk);
            $foto_produk = 'upload/foto_produk/' . $foto_produk;
        }

        $inputanFoto['foto_produk'] = $foto_produk;

        foto_produk::create($inputanFoto);
        return redirect()->back()->with('Success', 'Foto produk berhasil diupload');


    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Form Produk";
        $produk = produk::findOrFail($id);
        $itemkategori = kategori::all();
        return view('produk.edit', compact('title', 'produk', 'itemkategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'id_kategori' => 'required',
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'slug_produk' => 'required',
            'deskripsi_produk' => 'required',
            'qty' => 'required|numeric',
            'satuan' => 'required',
            'harga' => 'required|numeric',
            'status' => 'required',
            'diskon' => 'numeric',
        ]);

        $itemProduk = produk::findOrFail($id); 
        $slug = Str::slug($request->slug_produk);
        $validasiSlug = produk::where('id_produk', '!=', $id)
                            -> where('slug_produk', $slug)
                            -> first();
        if($validasiSlug) {
            return back()->with('error', 'Slug sudah ada, coba cara lain');
        }else{
            $inputanProduk = $request->all();
            $inputanProduk['slug_produk'] = $slug;
            $itemProduk->update($inputanProduk);

            return redirect()->route('produk.index')->with('Success', 'Data produk anda berhasil diupdate');
        }


    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteProduk = produk::find($id);

        foto_produk::where('id_produk', $deleteProduk->id_produk)->delete();

        $fotoproduk = foto_produk::where('id_produk', $deleteProduk->id_produk)->get();

        foreach($fotoproduk as $fp){
            if(file_exists($fp)){
                unlink($fp);
            }
        }

        if($deleteProduk->delete()) {
            return back()->with('Success', 'Data produk berhasil dihapus');
        }else{
            return back()->with('error', 'Data produk gagal dihapus');
        }
    }

    public function destroy_foto(string $id) {

        $fotoProduk = foto_produk::findOrFail($id);

        if(file_exists($fotoProduk->foto_produk)){
            unlink($fotoProduk->foto_produk);
        }

        if($fotoProduk->delete()){
           return redirect()->back()->with('Success', 'Foto produk berhasil dihapus'); 
        }else{
            return redirect()->back()->with('error', 'Foto produk gagak dihapus');
        }

    }
}
