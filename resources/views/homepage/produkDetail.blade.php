@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col col-lg-6 col-md-6">
                <div id='carousel' class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($itemProduk->foto_produk as $index => $foto)
                        @if ($index == 0)
                            <div class="carousel-item active">
                                <img src="{{ asset($foto->foto_produk) }}" alt="" class="d-block w-100">
                            </div>
                        @else
                            <div class="carousel-item">
                                <img src="{{ asset($foto->foto_produk) }}" alt="" class="d-block w-100">
                            </div>
                        @endif
                    @endforeach
                    </div>
                </div>
                <a href="#carousel" class="carousel-control-prev" role="button" data-slide='prev'>
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a href="#carousel" class="carousel-control-next" role='button' data-slide='next'>
                    <span class="carousel-control-next-icon" aria-hidden='true'></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="col col-lg-6 col-md-6">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Deskripsi
                            </div>
                            <div class="card-body">
                                {{ $itemProduk->deskripsi_produk }}
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                        <span class="alert alert-warning"> {{ $error }} </span>
                                    @endforeach
                                @endif
                                @if ($message = Session::get('error'))
                                    <span class="alert alert-warning"> {{ $message }} </span>
                                @endif
                                @if ($message = Session::get('Success'))
                                    <span class="alert alert-success"> {{ $message }} </span>
                                @endif
                                <span class="small"> {{ ($itemProduk->kategori->nama_kategori ?? '') }} </span>
                                <h5><strong> {{ $itemProduk->nama_produk }} </strong></h5>
                                <p>
                                    @if ($itemProduk->diskon > 0)
                                        <del>Rp. {{ number_format($itemProduk->harga, 2) }} </del>
                                    @endif
                                    <br>
                                    Rp.
                                    {{ number_format($itemProduk->harga - ($itemProduk->harga / 100) * $itemProduk->diskon, 2) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('cartdetail.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $itemProduk->id_produk }}">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        <i class="fa fa-shopping-cart"></i>
                                        Tambahkan ke Keranjang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
