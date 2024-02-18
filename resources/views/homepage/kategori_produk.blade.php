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
            <div class="row mt-4">
                <div class="col-3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itemListKategori as $ilk)
                                <tr>
                                    <td>
                                        <a href="{{route('home.kategoribyslug', $ilk->slug_kategori)}}">{{$ilk->nama_kategori}}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-9">
                    <h2>{{ $itemKategori->nama_kategori }}</h2>
                    <div class="row mt-2">
                        <div class="col">
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
                    </div>
                </div>
            </div>
        </div>
    @endsection
