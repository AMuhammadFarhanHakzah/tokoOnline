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
                        @if(count($errors)>0)
                            @foreach ($errors as $error)
                                <div class="alert alert-warning">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        @if($message = Session::get('error')) 
                            <div class="alert alert-warning">
                                <p>
                                    {{$message}}
                                </p>
                            </div>
                        @endif
                        @if($message = Session::get('Success'))
                            <div class="alert alert-success">
                                <p>
                                    {{$message}}
                                </p>
                            </div>
                        @endif
                        <form action="#">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id='keyword' placeholder='Cari berdasarkan nama pengirim, nama yang dikirim, dan status pembayaran atau status pengiriman'>
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
                                        <th>Ongkir</th>
                                        <th>Total</th>
                                        <th>Status Pembayaran</th>
                                        <th>Status Pengiriman</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($itemOrder as $order)
                                        <tr>
                                            <td> {{++$no}} </td>
                                            <td> {{$order->no_invoice}} </td>
                                            <td> {{number_format($order->subtotal, 2)}} </td>
                                            <td> {{number_format($order->ongkir, 2)}} </td>
                                            <td> {{number_format($order->total, 2)}} </td>
                                            <td> 
                                                @if($order->status_pembayaran === 'belumdibayar')
                                                    Belum Dibayar
                                                @else
                                                    Sudah Dibayar
                                                @endif    
                                            </td>
                                            <td> 
                                                @if ($order->status_pengiriman === 'belum')
                                                    Belum Dikirim
                                                @else
                                                    Sudah Dikirim
                                                @endif    
                                            </td>
                                            <td>
                                                <td>
                                                    <a href="{{route('transaksi.show', $order->id_order)}}" class="btn btn-sm btn-info">Detail</a>
                                                    <a href="{{route('transaksi.edit', 1)}}" class="btn btn-sm btn-primary">Edit</a>
                                                </td>
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