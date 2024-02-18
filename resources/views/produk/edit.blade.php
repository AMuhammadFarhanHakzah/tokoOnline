@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-lg-3 md-3"></div>
            <div class="col col-lg-6 md-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Form Produk</h3>
                        </div>
                        <div class="card-tools">
                            <a href="{{ route('produk.index') }}" class="btn btn-danger">Tutup</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @endif
                        <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_kategori">Kategori Produk</label>
                                <select name="id_kategori" id="id_kategori"
                                    class="form-control @error('id_kategori') is-invalid @enderror">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($itemkategori as $kategori)
                                        <option value="{{ $kategori->id_kategori }}"
                                            {{ old('id_kategori', $produk->id_kategori) == $kategori->id_kategori ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode_produk">Kode Produk</label>
                                <input type="text" id='kode_produk' name="kode_produk" kategori='kode_produk'
                                    class='form-control @error('kode_produk') is-invalid @enderror'
                                    value="{{ old('kode_produk', $produk->kode_produk) }}">
                                @error('kode_produk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" id='nama_produk' name='nama_produk' kategori='nama_produk'
                                    class='form-control @error('nama_produk') is-invalid @enderror'
                                    value="{{ old('nama_produk', $produk->nama_produk) }}">
                                @error('nama_produk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug_produk">Slug Produk</label>
                                <input type="text" id="slug_produk" name="slug_produk" kategori="slug_produk"
                                    class="form-control @error('slug_produk') is-invalid @enderror"
                                    value="{{ old('slug_produk', $produk->slug_produk) }}">
                                @error('slug_produk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_produk">Deskripsi</label>
                                <textarea name="deskripsi_produk" id="deskripsi_produk" cols="30" rows="5"
                                    class='form-control @error('deskripsi_produk') is-invalid @enderror' placeholder="Ketik Keyword Disini"> {{ old('deskripsi_produk', $produk->deskripsi_produk) }} </textarea>
                                @error('deskripsi_produk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="qty">Qty</label>
                                        <input type="number" name='qty' id='qty'
                                            class="form-control @error('qty') is-invalid @enderror"
                                            value="{{ old('qty', $produk->qty) }}">
                                        @error('qty')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" name='satuan' id='satuan'
                                            class="form-control @error('satuan') is-invalid @enderror"
                                            value="{{ old('satuan', $produk->satuan) }}">
                                        @error('satuan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <div class="input-group">
                                    <input type="number" name='harga' id='harga'
                                        class="form-control @error('harga') is-invalid @enderror"
                                        value="{{ old('harga', $produk->harga) }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            Rp
                                        </span>
                                    </div>
                                </div>
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="diskon">Diskon</label>
                                <div class="input-group">
                                    <input type="number" name="diskon" id="diskon"
                                        class="form-control @error('diskon') is-invalid @enderror"
                                        value="{{ old('diskon', $produk->diskon) }}" placeholder='0'>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </div>
                                </div>
                                @error('diskon')
                                    <span class="invalid-feedback" role='alert'>
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="publish"
                                        {{ old('status', $produk->status) === 'publish' ? 'selected' : '' }}>Publish
                                    </option>
                                    <option value="tidakpublish"
                                        {{ old('status', $produk->status) === 'tidakpublish' ? 'selected' : '' }}>
                                        Tidak Publish</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <button type="reset" class="btn btn-warning ml-2">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 md-3"></div>
        </div>
    </div>
@endsection
