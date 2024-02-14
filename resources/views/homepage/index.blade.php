@extends('layouts.template')

@push('css')
    <style>
        #carousel img {
            width: 100%;
            height: 84vh;
            object-fit: cover;
            object-position: center;
        }

        #carousel-background {
            width: 100%;
            padding-bottom: 5em;
            background: linear-gradient(to bottom, rgb(145, 23, 74), transparent);
        }

        #card img {
            width: 100%;
            height: 40vh;
            object-fit: cover;
        }

        #jarak {
            padding-top: 18em;
        }

        .custom-font {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>

    @section('content')
        <div class="container-fluid">
            <!-- carousel -->
            <div class="row">
                <div class="col-1" id="carousel-background"></div>
                <div class="col-10" id='carousel-background'>
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($itemSlide as $index => $slide)
                                @if ($index == 0)
                                    <div class="carousel-item active">
                                        <img src="{{ asset($slide->foto) }}" alt="...">
                                        <div class="carousel-caption d-none d-md-block bg-secondary rounded-pill">
                                            <h3 class="text-shadow text-bold">
                                                {{ $slide->caption_title }}
                                            </h3>
                                        </div>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{ asset($slide->foto) }}" alt="...">
                                        <div class="carousel-caption d-none d-md-block bg-secondary rounded-pill">
                                            <h3 class="text-shadow text-bold">
                                                {{ $slide->caption_title }}
                                            </h3>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <a href="#carousel" class="carousel-control-prev" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a href="#carousel" class="carousel-control-next" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>
                </div>
                <div class="col-1" id="carousel-background"></div>

            </div>
            <!-- end carousel -->

            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <!-- kategori produk -->
                    <div class="row mt-4">
                        <div class="col col-md-12 col-sm-12 mb-4">
                            <h2 class="text-center">Kategori Produk</h2>
                        </div>
                        @foreach ($itemKategori as $ik)
                            <div class="col-md-4 ">
                                <div class="card mb-4 shadow-sm" id="card">
                                    <a href="#">
                                        <img src="{{ asset($ik->foto) }}" alt="" class="card-img-top">
                                    </a>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="card-text"> {{ $ik->nama_kategori }} </p>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="#" class="btn btn-info">Lihat Kategori</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- end kategori produk -->

                    <!-- produk promo -->
                    <div class="row mt-4">
                        <div class="col col-md-12 col-sm-12 mb-4">
                            <h2 class="text-center">Promo</h2>
                        </div>
                        @foreach ($itemPromo as $ip)
                            @if ($ip->diskon > 0)
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm" id='card'>
                                        @foreach ($ip->foto_produk->take(1) as $foto)
                                            <a href="#">
                                                <img src="{{ asset($foto->foto_produk) }}" alt="" class="card-img-top">
                                            </a>
                                        @endforeach
                                        <div class="card-body">
                                            <a href="#" class="text-decoration-none">
                                                <p class="card-text">
                                                    {{ $ip->nama_produk }}
                                                </p>
                                            </a>
                                            <div class="row mt-4">
                                                <div class="col">
                                                    <a href="#" class="btn btn-info">Detail</a>
                                                </div>
                                                <div class="col-auto">
                                                    <p>
                                                        @if ($ip->diskon > 0)
                                                            <del>Rp. {{ number_format($ip->harga, 2) }} </del>
                                                        @endif
                                                        <br>
                                                        Rp.
                                                        {{ number_format($ip->harga - ($ip->harga / 100) * $ip->diskon, 2) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- end produk promo -->
                    <!-- produk terbaru -->
                    <div class="row mt-4">
                        <div class="col col-md-12 col-sm-12 mb-4">
                            <h2 class="text-center">Terbaru</h2>
                        </div>
                        @foreach ($itemProduk as $iproduk)
                            @if ($iproduk->diskon > 0)
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm" id='card'>
                                        @foreach ($iproduk->foto_produk->take(1) ?? '' as $foto)
                                            <a href="#">
                                                <img src="{{ asset($foto->foto_produk) }}" alt="" class="card-img-top">
                                            </a>
                                        @endforeach
                                        <div class="card-body">
                                            <a href="#" class="text-decoration-none">
                                                <p class="card-text">
                                                    {{ $iproduk->nama_produk }}
                                                </p>
                                            </a>
                                            <div class="row mt-4">
                                                <div class="col">
                                                    <a href="#" class="btn btn-info">Detail</a>
                                                </div>
                                                <div class="col-auto">
                                                    <p>
                                                        @if (empty($iproduk->diskon))
                                                            <p>
                                                                Rp. {{ number_format($iproduk->harga, 2) }}
                                                            </p>
                                                        @else
                                                            <p>
                                                                Rp.
                                                                {{ number_format($iproduk->harga - ($iproduk->diskon / 100) * $iproduk->harga, 2) }}
                                                            </p>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- end produk terbaru -->
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    @endsection
