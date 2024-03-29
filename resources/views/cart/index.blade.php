@extends('layouts.template')
@section('content')
<div class="container mt-4">
    <div class="row">
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itemCart->cartdetail as $detail)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td>
                                        {{ $detail->produk->nama_produk }}
                                        <br>
                                        {{ $detail->produk->kode_produk }}
                                    </td>
                                    <td> {{ number_format($detail->harga, 2) }} </td>
                                    <td>
                                        <div class="btn-group" role='group'>
                                            <form action="{{ route('cartdetail.update', $detail->id_cart_detail) }}"
                                                method="POST">
                                                @method('patch')
                                                @csrf
                                                <input type="hidden" name="param" value="kurang">
                                                <button class="btn btn-primary btn-sm">
                                                    -
                                                </button>
                                            </form>
                                            <button class="btn btn-outline-primary btn-sm" disabled='true'>
                                                {{ number_format($detail->qty, 2) }}
                                            </button>
                                            <form action="{{ route('cartdetail.update', $detail->id_cart_detail) }}"
                                                method='POST'>
                                                @method('patch')
                                                @csrf
                                                <input type="hidden" name='param' value='tambah'>
                                                <button class="btn btn-primary btn-sm">
                                                    +
                                                </button>
                                            </form>
                                    </td>
                                    <td> Rp. {{ number_format($detail->subtotal, 2) }} </td>
                                    <td>
                                        <form action="{{ route('cartdetail.destroy', $detail->id_cart_detail) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm" mb-2>
                                                Hapus
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col col-md-4">
            <div class="card">
                <div class="card-header">
                    Ringkasan
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>No Invoice</td>
                            <td class="text-right">
                                {{ $itemCart->no_invoice }}
                            </td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td class="text-right">
                                Rp. {{ number_format($itemCart->subtotal, 2) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td class="text-right">
                                Rp. {{ number_format($itemCart->total, 2) }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('checkout.checkout')}}" class="btn btn-primary btn-block">
                                Checkout
                            </a>
                        </div>
                        <div class="col">
                            <form action="{{ url('kosongkan') . '/' . $itemCart->id_cart }}" method="POST">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-danger btn-block">Kosongkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @extends('layouts.template')
@section('content')
    <div class="container">
        <div class="col col-md-8">
            @if (count($errors) > 0)
                @foreach ($errors->all as $error)
                    <div class="alert-alert-warning">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('Success'))
                <div class="alert-alert-success">
                    <p> {{ $message }} </p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Item
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itemCart->cartdetail as $detail)
                                    <tr>
                                        <td> {{$no++}} </td>
                                        <td> 
                                            {{$detail->produk->nama_produk}} 
                                            <br>
                                            {{$detail->produk->kode_produk}}
                                        </td>
                                        <td> {{number_format($detail->harga, 2)}} </td>
                                        <td>
                                            <form action="#" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="param" value="kurang">
                                                <button class="btn btn-primary btn-sm">
                                                    -
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm" disable="true">
                                                {{number_format($detail->qty)}}
                                            </button>
                                        </td>
                                        <td>
                                            <form action="#" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="param" value="tambah">
                                                <button class="btn btn-primary btn-sm">
                                                    +
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="#" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    Hapus
                                                </button>
                                            </form>
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
@endsection --}}