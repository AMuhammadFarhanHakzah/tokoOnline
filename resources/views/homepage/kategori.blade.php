@extends('layouts.template')
@section('content')
    <!-- kategori produk -->
    <div class="container">
      <div class="row mt-4">
          <div class="col col-md-12 col-sm-12 mb-4">
          <h2 class="text-center">Kategori Produk</h2>
          </div>
          <!-- kategori pertama -->
          <div class="col-md-4 ">
          <div class="card mb-4 shadow-sm">
              <a href="#">
              <img src="{{asset('assets/images/image1.jpg')}}" alt="" class="card-img-top">
              </a>          
              <div class="card-body">
              <a href="#" class="text-decoration-none">
                  <p class="card-text">Kategori Pertama</p>
              </a>
              </div>
          </div>
          </div>
          <!-- kategori kedua -->
          <div class="col-md-4 ">
          <div class="card mb-4 shadow-sm">
              <a href="#">
              <img src="{{asset('assets/images/image2.jpg')}}" alt="" class="card-img-top">
              </a>          
              <div class="card-body">
              <a href="#" class="text-decoration-none">
                  <p class="card-text">Kategori Kedua</p>
              </a>
              </div>
          </div>
          </div>
          <!-- kategori ketiga -->
          <div class="col-md-4 ">
          <div class="card mb-4 shadow-sm">
              <a href="#">
              <img src="{{asset('assets/images/image3.jpg')}}" alt="" class="card-img-top">
              </a>          
              <div class="card-body">
              <a href="#" class="text-decoration-none">
                  <p class="card-text">Kategori Ketiga</p>
              </a>
              </div>
          </div>
          </div>
      </div>
  <!-- end kategori produk -->
  <!-- produk terbaru -->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-center">Terbaru</h2>
    </div>

    <!-- promo pertama -->
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
        <a href="#">
          <img src="{{asset('assets/images/image1.jpg')}}" alt="" class="card-img-top">
        </a>
      
        <div class="card-body">
          <a href="#" class="text-decoration-none">
            <p class="card-text">
              Produk Pertama
            </p>
          </a>
          <div class="row mt-4">
            <div class="col">
              <button class="btn btn-light">
                <i class="far fa-heart"></i>
              </button>
            </div>            
            <div class="col-auto">
              <p>
                <br>Rp.20.000,00
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end promo pertama -->
    <!-- promo kedua -->
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
        <a href="#">
          <img src="{{asset('assets/images/image2.jpg')}}" alt="" class="card-img-top">
        </a>
      
        <div class="card-body">
          <a href="#" class="text-decoration-none">
            <p class="card-text">
              Produk Kedua
            </p>
          </a>
          <div class="row mt-4">
            <div class="col">
              <button class="btn btn-light">
                <i class="far fa-heart"></i>
              </button>
            </div>            
            <div class="col-auto">
              <p>
                <br>Rp.30.000,00
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end promo kedua -->
    <!-- promo ketiga -->
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
        <a href="#">
          <img src="{{asset('assets/images/image3.jpg')}}" alt="" class="card-img-top">
        </a>
      
        <div class="card-body">
          <a href="#" class="text-decoration-none">
            <p class="card-text">
              Produk Ketiga
            </p>
          </a>
          <div class="row mt-4">
            <div class="col">
              <button class="btn btn-light">
                <i class="far fa-heart"></i>
              </button>
            </div>            
            <div class="col-auto">
              <p>
                <br>Rp.10.000,00
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end promo ketiga -->
  </div>
  <!-- end produk terbaru -->
  </div>
      
    
    

@endsection