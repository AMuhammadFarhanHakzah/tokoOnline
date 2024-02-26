@extends('layouts.template')
@section('content')

<div class="container">
    <div class="row">
        <div class="col col-lg-8 col-md-8 mb-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Item
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itemOrder->cart->cartdetail as $order)
                                    <tr>
                                        <td> {{$no++}} </td>
                                        <td>
                                            {{$order->produk->kode_produk}}
                                        </td>
                                        <td>
                                            {{$order->produk->nama_produk}}
                                        </td>
                                        <td>
                                            {{number_format($order->harga, 2)}}
                                        </td>
                                        <td>
                                            {{$order->qty}}
                                        </td>
                                        <td>
                                            {{$order->subtotal}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5">
                                        <b> Total </b>
                                    </td>
                                    <td class="text-right">
                                        <b>
                                            {{number_format($itemOrder->cart->total, 2)}}
                                        </b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('transaksiUser.index')}}" class="btn btn-danger btn-sm">Tutup</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Metode Pembayaran
                    </h3>
                </div>
                <div class="card-body">
                    <style>
                        @media (min-width: 768px) {
                            .metode {
                                margin-top: -30vh;
                            }
                        }
                        @media (min-width: 992px) {
                            .metode {
                                margin-top: -10vh;
                            }
                        }
                        @media (min-width: 1200px) {
                            .metode {
                                margin-top: 0vh;
                            }
                        }
                    </style>
                    <div class="metode">
                        <style>
                            .pembayaran {
                                background: #f9f9f9;
                                border: 1px solid #eaeaea;
                                box-sizing: border-box;
                                box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                                height: 100%;
                            }
                            @media (min-width: 992px) {
                                .pembayaran {
                                    height: 20vh;
                                }
                            }
                        </style>
                        <div class="kotak">
                            <div class="row">
                                <div class="col md-4 mt-3">
                                    <div class="card border-4 pembayaran p-3">
                                        <img src="{{asset('assets/images/lowongan-kerja-bank-bri.jpg')}}" alt="" class="ml-2" width="50%"
                                        style="margin-top: 5px">
                                        <p class="ml-2" style="font-size: 0.8em; margin-top: 10px;">
                                            BRI - 08123xxxx975 
                                            <br>
                                            a/n Setiono
                                        </p>
                                    </div>
                                </div>
                                <div class="col md-4 mt-3">
                                    <div class="card border-4 pembayaran p-3">
                                        <img src="{{asset('assets/images/dana.jpg')}}" alt="" class="ml-2" width="60%"
                                        style="margin-top: -10px">
                                        <p class="ml-2" style="font-size: 0.8em; margin-top: 0px;">
                                            Dana - 08123xxxx975 
                                            <br>
                                            a/n Setiono
                                        </p>
                                    </div>
                                </div>
                                <div class="col md-4 mt-3">
                                    <div class="card border-4 pembayaran p-3">
                                        <img src="{{asset('assets/images/gopay-1.jpg')}}" alt="" class="ml-2" width="50%"
                                        style="margin-top: -13px; margin-left: -10px">
                                        <p class="ml-2" style="font-size: 0.8em; margin-top: -15px;">
                                            Gopay - 08123xxxx975 
                                            <br>
                                            a/n Setiono
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-lg-4 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Alamat Pengiriman
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama Penerima</td>
                                    <td class="text-right"> {{$itemOrder->nama_penerima}} </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td  class="text-right">
                                        {{$itemOrder->kelurahan}}
                                        ,
                                        {{$itemOrder->kecamatan}}
                                        <br>
                                        {{$itemOrder->kota}}
                                        ,
                                        {{$itemOrder->provinsi}}
                                        -
                                        {{$itemOrder->kodepos}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>No Tlp</td>
                                    <td class="text-right">
                                        {{$itemOrder->no_tlp}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Ringkasan
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Total</td>
                                    <td class="text-right"> 
                                        {{number_format($itemOrder->cart->total, 2)}}    
                                    </td>
                                </tr>
                                <tr>
                                    <td>Subtotal</td>
                                    <td class="text-right"> 
                                        {{number_format($itemOrder->cart->subtotal, 2)}}    
                                    </td>
                                </tr>
                                <tr>
                                    <td> Ongkir </td>
                                    <td class="text-right">
                                        {{number_format($itemOrder->cart->ongkir)}}
                                    </td>
                                </tr>
                                <tr>
                                    <td> Ekspedisi </td>
                                    <td class="text-right">
                                        {{$itemOrder->cart->ekspedisi}}
                                    </td>
                                </tr>
                                <tr>
                                    <td> No. Resi </td>
                                    <td class="text-right">
                                        {{$itemOrder->cart->no_resi}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status Pembayaran</td>
                                    <td class="text-right">
                                        {{$itemOrder->cart->status_pembayaran}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status Pengiriman</td>
                                    <td class="text-right">
                                        {{$itemOrder->cart->status_pengiriman}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="https://api.whatsapp.com/send?phone=6285338238107" class="btn btn-success">Konfirmasi Admin</a>
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