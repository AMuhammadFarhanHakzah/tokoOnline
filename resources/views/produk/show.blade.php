@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-lg-4 md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Detail</h3>
                        </div>
                        <div class="card-tools">
                            <a href="{{ route('produk.index') }}" class="btn btn-danger">Tutup</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>
                                        Kode Produk
                                    </td>
                                    <td>
                                        {{ $detailProduk->kode_produk }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nama Produk
                                    </td>
                                    <td>
                                        {{ $detailProduk->nama_produk }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Qty
                                    </td>
                                    <td>
                                        {{ $detailProduk->qty }} {{ $detailProduk->satuan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Harga Produk
                                    </td>
                                    <td>
                                        Rp.
                                        {{ number_format($detailProduk->harga - ($detailProduk->harga / 100) * $detailProduk->diskon) }}
                                        <br>
                                        @if ($detailProduk->diskon > 0)
                                            Rp. <del>{{ number_format($detailProduk->harga) }}</del>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Diskon
                                    </td>
                                    <td>
                                        {{ $detailProduk->diskon }} %
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Foto Produk
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produk.store_foto') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_produk" value="{{ $detailProduk->id_produk }}">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="file" name="foto_produk" id="foto_produk"
                                            class="form-control @error('foto_produk') is-invalid @enderror">
                                        @error('foto_produk')
                                            <div class="alert text-danger" role='alert'>
                                                <span class="text-center">
                                                    !!! {{ $message }} !!!
                                                </span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if ($message = Session::get('Success'))
                        <div class="alert alert-success" role="alert">
                            <span>
                                {{ $message }}
                            </span>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            @forelse($fotoProduk as $fp)
                                <div class="col col-md-3 mb-2">
                                    <img src="{{ asset($fp->foto_produk) }}" alt="gambar" class="img-thumbnail mb-2">
                                    <form action="{{ route('produk.destroy_foto', $fp->id_foto_produk) }}" method="POST"
                                        style="display:inline;"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus foto produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            @empty
                                <div class="col-md-12">
                                    <div class="alert text-muted text-center mb-5">
                                        Foto masih kosong
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
