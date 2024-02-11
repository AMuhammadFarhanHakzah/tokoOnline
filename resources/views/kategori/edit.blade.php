@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-3 col-md-3"></div>
        <div class="col col-lg-6 col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Kategori</h3>
                    <div class="card-tools">
                        <a href="{{route('kategori.index')}}" class="btn btn-danger">Tutup</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('kategori.update', $kategori->id_kategori)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode_kategori">Kode Kategori</label>
                            <input type="text" name="kode_kategori" id="kode_kategori" class="form-control 
                            @error ('kode_kategori') is-invalid @enderror" value="{{old('kode_kategori', $kategori->kode_kategori)}}">
                            @error('kode_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{$message}} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control 
                            @error ('nama_kategori') is-invalid @enderror" value="{{old('nama_kategori', $kategori->nama_kategori)}}">
                            @error('nama_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{$message}} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug_kategori">Slug Kategori</label>
                            <input type="text" name="slug_kategori" id="slug_kategori" class="form-control
                            @error ('slug_kategori') is-invalid @enderror" value="{{old('slug_kategori', $kategori->slug_kategori)}}">
                            @error('slug_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{$message}} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                            <div class="row mt-4">
                                <div class="col-3"></div>
                                <img src="{{asset($kategori->foto)}}" alt="" width="200px">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="publish" {{old('status', $kategori->status) === 'publish' ? 'selected' : ''}}>Publish</option>
                                <option value="tidakpublish" {{old('status', $kategori->status) === 'tidakpublish' ? 'selected' : ''}}>Tidak Publish</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_kategori">Deskripsi</label>
                            <textarea name="deskripsi_kategori" id="deskripsi_kategori" cols="30" rows="5" class="form-control
                            @error ('deskripsi_kategori') is-invalid @enderror">
                                {{old('deskripsi_kategori', $kategori->deskripsi_kategori)}}
                            </textarea>
                            @error('deskripsi_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{$message}} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col col-lg-3 col-md-3"></div>
    </div>
</div>
@endsection