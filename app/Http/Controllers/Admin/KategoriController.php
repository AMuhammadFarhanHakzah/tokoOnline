<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Kategori";
        $items = kategori::paginate(10);
        return view('kategori.index', compact('title', 'items'));
    }

    public function cari(Request $request) {
        $title = 'Cari Produk';
        $cari = $request->key;
        $items = kategori::where('kode_kategori', 'LIKE', '%'.$cari.'%')
                        ->orWhere('nama_kategori', 'LIKE', '%'.$cari.'%')
                        ->orWhere('status', 'LIKE', '%'.$cari.'%')
                        ->paginate(10);

        return view('kategori.index', compact('title', 'items', 'cari'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Form Kategori";
        return view('kategori.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_kategori' => 'required|unique:kategori',
            'nama_kategori' => 'required',
            'slug_kategori' => 'required',
            'deskripsi_kategori' => 'required',
            'status' => 'required',
        ]);

        $inputan = $request->all();

        $inputan['slug_kategori'] = Str::slug($request->slug_kategori);

        $foto = "";
        if($request->hasFile('foto')){
            $image = $request->foto;
            $foto = time() . $image->getClientOriginalName();
            $image->move('upload/kategori/', $foto);
            $foto = 'upload/kategori/' . $foto;
        }


        $inputan['foto'] = $foto;

        kategori::create($inputan);
        return redirect()->route('kategori.index')->with('Success', 'Data anda berhasil dibuat');
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
        $title = 'Form Kategori';
        $kategori = kategori::findOrFail($id);
        return view('kategori.edit', compact('title', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'kode_kategori' => 'required',
            'nama_kategori' => 'required',
            'slug_kategori' => 'required',
            'deskripsi_kategori' => 'required',
            'status' => 'required',
        ]);

        $kategori = kategori::findOrFail($id);
        $updateKategori = $request->all();
        $updateKategori['slug_kategori'] = Str::slug($request->slug_kategori);

        $foto = $kategori->foto;
        if($request->hasFile('foto')){
            $image = $request->foto;
            $foto = time().$image->getClientOriginalName();
            $image->move('upload/kategori/', $foto);
            $foto = 'upload/kategori/'.$foto;
        }

        $updateKategori['foto'] = $foto;

        $kategori->update($updateKategori);
        return redirect()->route('kategori.index')->with('Success', 'Data kategori berhasil diudpate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteKategori = kategori::findOrFail($id);
        
        if(count($deleteKategori->produk) > 0 ) {
            return back()->with('error', 'Hapus dulu produk di dalam kategori ini, proses dihentikan');
        } else{
            if($deleteKategori->delete()) {
                if(file_exists($deleteKategori->foto)){
                    unlink($deleteKategori->foto);
                }
                return back()->with('Success', 'Data berhasil dihapus');
            }else{
                return back()->with('error', 'Data gagal dihapus');
            }

        }

        

        return redirect()->route('kategori.index')->with('Success', 'Data kategori berhasil dihapus');
    }
}
