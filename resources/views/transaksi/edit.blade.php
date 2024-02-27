@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-lg-8 col-md-8 mb-2">
                @if (count($errors) > 0)
                    @foreach ($errors as $error)
                        <div class="alert alert-warning">
                            {{ $error }}
                        </div>
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
                                            <td> {{ $no++ }} </td>
                                            <td> {{ $order->produk->kode_produk }} </td>
                                            <td> {{ $order->produk->nama_produk }} </td>
                                            <td> {{ number_format($order->produk->harga, 2) }} </td>
                                            <td class="text-right"> {{ $order->produk->qty }} </td>
                                            <td class="text-right"> Rp. {{ number_format($order->subtotal, 2) }} </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th> Total </th>
                                        <th class="text-right" colspan="5"> Rp.
                                            {{ number_format($itemOrder->cart->total, 2) }} </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('transaksi.index') }}" class="btn btn-danger">Tutup</a>
                    </div>
                </div>
            </div>
            <div class="col col-lg-4 col-md-4 mb-2">
                <div class="table-responsive">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Ringkasan
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <form action="{{ route('transaksi.update', $itemOrder->id_order) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <thead>
                                        <tr>
                                            <td>Total</td>
                                            <td>
                                                <input type="number" id="total" name='total'
                                                    class="form-control @error('total') is-invalid @enderror"
                                                    value='{{ number_format($itemOrder->cart->total, 2) }}'>
                                            </td>
                                            @error('total')
                                                <div class="alert alert-danger">
                                                    <p>
                                                        {{ $message }}
                                                    </p>
                                                </div>
                                            @enderror
                                        </tr>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td>
                                                <input type="number" id="subtotal" name="subtotal"
                                                    class="form-control @error('subtotal') is-invalid @enderror"
                                                    value='{{ number_format($itemOrder->cart->subtotal, 2) }}'>
                                            </td>
                                            @error('subtotal')
                                                <div class="alert alert-danger">
                                                    <p>
                                                        {{ $message }}
                                                    </p>
                                                </div>
                                            @enderror
                                        </tr>
                                        <tr>
                                            <td>Ongkir</td>
                                            <td>
                                                <input type="number" id="ongkir" name="ongkir"
                                                    class="form-control @error('ongkir') is-invalid @enderror"
                                                    value="{{ number_format($itemOrder->cart->ongkir, 2) }}">
                                            </td>
                                            @error('ongkir')
                                                <div class="alert alert-danger">
                                                    <p>
                                                        {{ $message }}
                                                    </p>
                                                </div>
                                            @enderror
                                        </tr>
                                        <tr>
                                            <td>Ekspedisi</td>
                                            <td>
                                                <input type="text" id="ekspedisi" name="ekspedisi"
                                                    class="form-control @error('ekspedisi') is-invalid @enderror"
                                                    value="{{ $itemOrder->cart->ekspedisi }}">
                                            </td>
                                            @error('ekspedisi')
                                                <div class="alert alert-danger">
                                                    <p>
                                                        {{ $message }}
                                                    </p>
                                                </div>
                                            @enderror
                                        </tr>
                                        <tr>
                                            <td>No. Resi</td>
                                            <td>
                                                <input type="text" id="no_resi" name="no_resi"
                                                    class="form-control @error('no_resi') is-invalid d@enderror"
                                                    value="{{ $itemOrder->cart->no_resi }}">
                                            </td>
                                            @error('no_resi')
                                                <div class="alert alert-warning">
                                                    <p>
                                                        {{ $message }}
                                                    </p>
                                                </div>
                                            @enderror
                                        </tr>
                                        <tr>
                                            <td>Status Pembayaran</td>
                                            <td>
                                                <select name="status_pembayaran" id="status_pembayaran"
                                                    class="form-control">
                                                    <option value="{{ $itemOrder->cart->status_pembayaran }}"
                                                        {{ $itemOrder->cart->status_pembayaran == $itemOrder->cart->status_pembayaran ? 'selected' : '' }}>
                                                        Sudah Dibayar
                                                    </option>
                                                    <option value="{{ $itemOrder->cart->status_pembayaran }}"
                                                        {{ $itemOrder->cart->status_pembayaran == $itemOrder->cart->status_pembayaran ? 'selected' : '' }}>
                                                        Belum Dibayar
                                                    </option>
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status Pengiriman</td>
                                            <td>
                                                <select name="status_pengiriman" id="status_pengiriman"
                                                    class="form-control">
                                                    <option value="{{ $itemOrder->cart->status_pengiriman }}"
                                                        {{ $itemOrder->cart->status_pengiriman == $itemOrder->cart->status_pengiriman ? 'selected' : '' }}>
                                                        Sudah
                                                    </option>
                                                    <option value="belum"
                                                        {{ $itemOrder->cart->status_pengiriman == $itemOrder->cart->status_pengiriman ? 'selected' : '' }}>
                                                        Belum
                                                    </option>
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </td>
                                        </tr>
                                    </thead>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
