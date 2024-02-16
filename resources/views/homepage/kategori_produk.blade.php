@extends('layouts.template')
@push('css')
    <style>
        #kategori_image {
            width: 100%;
            height: 500px;
        }

        #card img {
            width: 100%;
            height: 40vh;
            object-fit: cover;
        }
    </style>
    @section('content')
        <div class="container">
            <div class="row mt-2">
                <div class="col-1"></div>
                <div class="col-10">
                    <a href="#">
                        <img src="{{ asset($itemKategori->foto) }}" alt="" id='kategori_image'
                            class="object-position-center mb-2">
                    </a>
                    <h2 class="text-center mt-2">Kategori: {{ $itemKategori->nama_kategori }}</h2>
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row mt-2">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="row">
                        @foreach ($itemKategori->produk as $produk)
                            <div class="col-4">
                                <div class="card" id='card'>
                                    @foreach ($produk->foto_produk->take(1) as $foto)
                                        <a href="{{ route('home.produkDetail', $produk->slug_produk) }}">
                                            <img src="{{ asset($foto->foto_produk) }}" alt="">
                                        </a>
                                    @endforeach
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('home.produkDetail', $produk->slug_produk) }}"
                                                    class="card-text">
                                                    {{ $produk->nama_produk }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mt-2">
                                                <a href="{{ route('home.produkDetail', $produk->slug_produk) }}"
                                                    class="btn btn-info">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    @endsection
