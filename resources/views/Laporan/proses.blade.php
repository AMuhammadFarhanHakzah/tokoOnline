@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Laporan Penjualan</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="text-center">
                            Periode Bulan Januari 2024
                        </h3>
                        <div class="row">
                            <div class="col col-lg-4 col-md-4">
                                <h4 class="text-center">
                                    Ringkasan Transaksi
                                </h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Total Penjualan</td>
                                            <td>Rp. 15.000.000</td>
                                        </tr>
                                        <tr>
                                            <td>Total Transaksi</td>
                                            <td>200 Transaksi</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col col-lg-8 col-md-8">
                                <h4 class="text-center">Rincian Transaksi</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Invoice</th>
                                            <th>Subtotal</th>
                                            <th>Ongkir</th>
                                            <th>Diskon</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Inv-01</td>
                                            <td>100.000</td>
                                            <td>27.000</td>
                                            <td>0</td>
                                            <td>127.000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection