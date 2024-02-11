<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\slideshow;
use Illuminate\Http\Request;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Slideshow';
        $itemSlideshow = slideshow::paginate(10);
        $page = $request->page ?? 1;
        $no = ($page - 1) * 10;
        return view('slideshow.index', compact('title', 'itemSlideshow', 'no'));
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
            'foto' => 'required', 
            'caption_title' => 'required',
        ]);
        // |mimes:jpeg,png,jpg,gif,svg|max:2048

        $inputanSlideshow = $request->all();

        $fotoSlideshow = '';

        if($request->hasFile('foto')) {
            $image = $request->foto;
            $fotoSlideshow = time().$image->getClientOriginalName();
            $image->move('upload/slideshow', $fotoSlideshow);
            $fotoSlideshow = 'upload/slideshow/'.$fotoSlideshow;
        }

        $inputanSlideshow['foto'] = $fotoSlideshow;

        slideshow::create($inputanSlideshow);

        return redirect()->back()->with('Success', 'Foto berhasil diupload ke slideshow');


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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fotoSlideshow = slideshow::findOrFail($id);

        if(file_exists($fotoSlideshow->foto)) {
            unlink($fotoSlideshow->foto);
        }

        if($fotoSlideshow->delete()){
            return redirect()->back()->with('Success', 'Foto berhasil dihapus');
        }else{
            return redirect()->back()->with('error', 'Foto gagal dihapus');
        }
    }
}
