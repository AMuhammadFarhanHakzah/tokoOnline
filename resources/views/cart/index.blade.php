@extends('layouts.template');
@section('content');
    <div class="container">
        <div class="col col-md-8">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning"> {{ $error }} </div>
                @endforeach
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
            @endif
            @if ($message = Session::get('Success'))
                <div class="alert alert-success">
                    <p>
                        {{ $message }}
                    </p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Item
                </div>
                <div class="card-body">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($itemCart->cartDetail as $detail)
                            <tr>
                                <td> {{$no++}} </td>
                                <td> 
                                    {{$detail->nama_produk}} 
                                    <br>
                                    {{$detail->kode_produk}}
                                </td>
                                <td> {{number_format($detail->harga, 2)}} </td>
                                <td>
                                    <form action="#" method="POST">
                                        @csrf
                                        <input type="hidden" name="param"  value="kurang">
                                        <button class="btn btn-primary btn-sm">
                                            -
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </div>
            </div>
        </div>
    </div>
@endsection
