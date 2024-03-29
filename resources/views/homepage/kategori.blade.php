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
    <!-- kategori produk -->
    <div class="container">
        <div class="row mt-4">
            <div class="col col-md-12 col-sm-12 mb-4">
                <h2 class="text-center">Kategori Produk</h2>
            </div>
            <!-- kategori pertama -->
            @foreach ($itemKategori as $ik)
                <div class="col-md-4 ">
                    <div class="card mb-4 shadow-sm" id='card'>
                        <a href="{{route('home.kategoribyslug', $ik->slug_kategori)}}">
                            <img src="{{ asset($ik->foto) }}" alt="" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <a href="#" class="text-decoration-none">
                                <p class="card-text"> {{$ik->nama_kategori}} </p>
                            </a>
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
          @foreach ($itemProduk as $iproduk)
              @if ($iproduk->diskon > 0)
                  <div class="col-md-4">
                      <div class="card mb-4 shadow-sm" id='card'>
                          @foreach ($iproduk->foto_produk->take(1) as $foto)
                              <a href="{{route('home.produkDetail', $iproduk->slug_produk)}}">
                                  <img src="{{ asset($foto->foto_produk) }}" alt="" class="card-img-top">
                              </a>
                          @endforeach
                          <div class="card-body">
                              <a href="{{route('home.produkDetail', $iproduk->slug_produk)}}" class="text-decoration-none">
                                  <p class="card-text">
                                      {{ $iproduk->nama_produk }}
                                  </p>
                              </a>
                              <div class="row mt-4">
                                  <div class="col">
                                      <a href="{{route('home.produkDetail', $iproduk->slug_produk)}}" class="btn btn-info">Detail</a>
                                  </div>
                                  <div class="col-auto">
                                      <p>
                                          @if ($iproduk->diskon > 0)
                                              <del>Rp. {{ number_format($iproduk->harga, 2) }} </del>
                                          @endif
                                          <br>
                                          Rp.
                                          {{ number_format($iproduk->harga - ($iproduk->harga / 100) * $iproduk->diskon, 2) }}
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
                <h2 class="text-center">Produk Terbaru</h2>
            </div>

            <!-- terbaru pertama -->
            @foreach ($itemProduk as $iproduk)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm" id='card'>
                        @foreach ($iproduk->foto_produk->take(1) as $foto)
                            <a href="{{route('home.produkDetail', $iproduk->slug_produk)}}">
                                <img src="{{ asset($foto->foto_produk) }}" alt="" class="card-img-top">
                            </a>
                        @endforeach

                        <div class="card-body">
                            <a href="{{route('home.produkDetail', $iproduk->slug_produk)}}" class="text-decoration-none">
                                <p class="card-text">
                                    {{ $iproduk->nama_produk }}
                                </p>
                            </a>
                            <div class="row mt-4">
                                <div class="col">
                                    <a href="{{route('home.produkDetail', $iproduk->slug_produk)}}" class="btn btn-info">Detail</a>
                                </div>
                                <div class="col-auto">
                                    <p>
                                        <br>Rp. {{ number_format($iproduk->harga, 2) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- end produk terbaru -->
    </div>
@endsection
