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
                                <tr>
                                    <td>1</td>
                                    <td>KATE-1</td>
                                    <td>Baju Anak</td>
                                    <td>Rp. 15.000</td>
                                    <td class="text-right">2</td>
                                    <td class="text-right">Rp. 30.000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>KATE-2</td>
                                    <td>Baju Anak</td>
                                    <td>Rp. 25.000</td>
                                    <td class="text-right">2</td>
                                    <td class="text-right">Rp. 50.000</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>KATE-3</td>
                                    <td>Baju Anak</td>
                                    <td>Rp. 35.000</td>
                                    <td class="text-right">2</td>
                                    <td class="text-right">Rp. 70.000</td>
                                </tr>
                                <tr>
                                    <td colspan='5'>
                                        <b>Total</b>
                                    </td>
                                    <td clsas='text-right'>
                                        <b>Rp. 150.000</b>
                                    </td>
                                </tr>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Total</td>
                                <td>Rp. 127.000</td>
                            </tr>
                            <tr>
                                <td>Subtotal</td>
                                <td>Rp. 150.000</td>
                            </tr>
                            <tr>
                                <td>Diskon</td>
                                <td>Rp. 0</td>
                            </tr>
                            <tr>
                                <td>Ongkir</td>
                                <td>Rp. 27.000</td>
                            </tr>
                            <tr>
                                <td>Ekspedisi</td>
                                <td>JNE</td>
                            </tr>
                            <tr>
                                <td>No. Resi</td>
                                <td>127831238143</td>
                            </tr>
                            <tr>
                                <td>Status Pembayaran</td>
                                <td>Sudah Dibayar</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>Dikirim</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection