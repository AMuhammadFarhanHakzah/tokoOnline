@extends('layouts.template')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Data Transaksi
                        </h3>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-warning "> {{ $error }} </div>
                            @endforeach
                        @endif
                        @if ($message = Session::get('error'))
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-warning">
                                    {{ $message }}
                                </div>
                            @endforeach
                        @endif
                        @if ($message = Session::get('Success'))
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-success">
                                    {{ $message }}
                                </div>
                            @endforeach
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Sub Total</th>
                                        <th>Ongkir</th>
                                        <th>Total</th>
                                        <th>Status Pembayaran</th>
                                        <th>Status Pengiriman</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($itemOrder as $order)
                                        <tr>
                                            <td> {{++$no}} </td>
                                            <td> {{$order->cart->no_invoice}} </td>
                                            <td> {{number_format($order->cart->subtotal, 2)}} </td>
                                            <td> {{number_format($order->cart->ongkir, 2)}} </td>
                                            <td> {{number_format($order->cart->total, 2)}} </td>
                                            <td> {{$order->cart->status_pembayaran}} </td>
                                            <td> {{$order->cart->status_pengiriman}} </td>
                                            <td>
                                                <a href="{{route('transaksiUser.show', $order->id_order)}}" class="btn btn-info btn-sm mb-2">Detail</a>
                                            </td>
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

@endsection
