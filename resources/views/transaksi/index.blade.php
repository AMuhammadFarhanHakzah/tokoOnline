@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <H3>Data Transaksi</H3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="#">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id='keyword' placeholder='Ketik Keyword Disini'>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Sub Total</th>
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
                                        <td>Rp. 200.000</td>
                                        <td>0</td>
                                        <td>Rp. 227.000</td>
                                        <td>Belum Dibayar</td>
                                        <td>Checkout</td>
                                        <td>
                                            <a href="{{route('transaksi.show', 1)}}" class="btn btn-sm btn-info">Detail</a>
                                            <a href="{{route('transaksi.edit', 1)}}" class="btn btn-sm btn-primary">Edit</a>
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