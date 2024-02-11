@extends('layouts.dashboard')
@section('content')
<div class="continer-fluid">
    <div class="row">
        <div class="col col-lg-4 col-md-4">
            <div class="card card-primary card-outline">
                <div class="text-center mt-2">
                    <img src="{{asset('assets/images/user1.jpg')}}" alt="profil" class="profile-user-img img-responsive img-circle">
                </div>
                <h3 class="profile-username text-center">A. Muhammad Farhan Hakzah</h3>
                <p class="text-muted text-center">Member sejak: 4 Januari 2024</p>
                <hr>
                <div class="mx-4">
                    <strong>
                        <i class="fas fa-map-marker mr-2"></i>Alamat
                    </strong>
                    <p class="text-muted">Jl. Poros Pare No.36, maccorawalie, Sidenreng Rappang</p>
                    <strong>
                        <i class="fas fa-envelope mr-2"></i>Email
                    </strong>
                    <p class="text-muted">andifarhanhakzah@gmail.com</p>
                    <strong>
                        <i class="fas fa-phone mr-2"></i>No. Tlp
                    </strong>
                    <p class="text-muted">085338238107</p>
                    <hr>
                    <a href="{{route('profil.setting')}}" class="btn btn-primary btn-block mb-4">Setting</a>
                </div>
            </div>
        </div>
        <div class="col col-lg-8 col-md-8">
            <div class="card card-primary card-ouline">
                <div class="card-header">
                    <div class="card-titles">
                        <h3>Histori Transaksi</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Invoice</th>
                                    <th>Subtotal</th>
                                    <th>Diskon</th>
                                    <th>Ongkir</th>
                                    <th>Total</th>
                                    <th>Status Pembayaran</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Inv-01</td>
                                    <td>200.000</td>
                                    <td>0</td>
                                    <td>27.000</td>
                                    <td>227.000</td>
                                    <td>Belum Dibayar</td>
                                    <td>Checkout</td>
                                    <td>
                                        <a href="{{route('transaksi.show', 2)}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection