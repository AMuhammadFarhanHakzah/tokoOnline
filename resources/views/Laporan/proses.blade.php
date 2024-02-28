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
                            Periode Bulan {{$bulan}} {{$tahun}}
                        </h3>
                        <div class="row">
                            <div class="col col-lg-4 col-md-4">
                                <h4 class="text-center">
                                    Ringkasan Transaksi
                                </h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        @php
                                            $total = 0;
                                            foreach ($itemTransaksi as $ik) {
                                                $total += $ik->cart->total;
                                            }
                                        @endphp
                                        <tr>
                                            <td>Total Penjualan</td>
                                            <td>Rp. {{number_format($total)}} </td>
                                        </tr>
                                        <tr>
                                            <td>Total Transaksi</td>
                                            <td> {{count($itemTransaksi)}} Transaksi</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col col-lg-8 col-md-8">
                                <h4 class="text-center">Rincian Transaksi</h4>
                                <table class="table table-stripped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Invoice</th>
                                            <th>Subtotal</th>
                                            <th>Ongkir</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($itemTransaksi as $transaksi)
                                            <tr>
                                                <td> {{$no++}} </td>
                                                <td> {{$transaksi->cart->no_invoice}} </td>
                                                <td> Rp.{{number_format($transaksi->cart->subtotal, 2)}} </td>
                                                <td> Rp.{{number_format($transaksi->cart->ongkir, 2)}} </td>
                                                <td> Rp.{{number_format($transaksi->cart->total, 2)}} </td>
                                            </tr>
                                        @endforeach
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
