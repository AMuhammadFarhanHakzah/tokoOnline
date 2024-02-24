@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8 col-md-8 mb-2">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Item
                    </div>
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
                                           Rp.{{number_format($order->produk->harga, 2)}}
                                        </td>
                                        <td class="text-right">
                                            {{$order->qty}}
                                        </td>
                                        <td class="text-right">
                                           Rp.{{number_format($order->subtotal, 2)}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('transaksi.index')}}" class="btn btn-danger">Tutup</a>
                </div>
            </div>
        </div>
        <div class="col col-lg-4 col-md-4 mb-2">
            <div class="table-responsive">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ringkasan</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Total</td>
                                    <td>Rp. {{number_format($itemOrder->cart->total)}} </td>
                                </tr>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>Rp. {{number_format($itemOrder->cart->subtotal)}} </td>
                                </tr>
                                <tr>
                                    <td>Ongkir</td>
                                    <td> {{number_format($itemOrder->cart->ongkir, 2)}} </td>
                                </tr>
                                <tr>
                                    <td>Ekspedisi</td>
                                    <td> {{$itemOrder->cart->ekspedisi}} </td>
                                </tr>
                                <tr>
                                    <td>No. Resi</td>
                                    <td> {{$itemOrder->cart->no_resi}} </td>
                                </tr>
                                <tr>
                                    <td>Status Pembayaran</td>
                                    <td> 
                                        @if ($itemOrder->cart->status_pembayaran === 'belumdibayar')
                                            Belum Dibayar
                                        @else
                                            Sudah Dibayar
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status Pengiriman</td>
                                    <td>
                                        @if ($itemOrder->cart->status_pengiriman === 'belum')
                                            Belum Dikirim
                                        @else
                                            Sudah Dikirim
                                        @endif
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection