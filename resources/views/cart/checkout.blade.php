@extends('layouts.template')
@section('content')

<div class="container">
    <div class="row">
        <div class="col col-8">
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-warning">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            @if ($message = Session::get('Success'))
                <div class="alert alert-success">
                    {{$message}}
                </div>
            @endif
            @if($message = Session::get('error'))
                <div class="alert alert-warning">
                    {{$message}}
                </div>
            @endif
            <div class="row">
                <div class="col col-12 mb-2">
                    <div class="card">
                        <div class="card-header">
                            Item
                        </div>
                        <div class="card-body">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
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
                                            <td>
                                                {{number_format($detail->harga, 2)}}
                                            </td>
                                            <td>
                                                {{number_format($detail->qty)}}
                                            </td>
                                            <td>
                                                {{number_format($detail->subtotal, 2)}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col col-12 mb-2">
                    <div class="card">
                        <div class="card-header">
                            Alamat Pengiriman
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table stripped">
                                    <thead>
                                        <tr>
                                            <th>Nama Penerima</th>
                                            <th>Alamat</th>
                                            <th>No tlp</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($itemAlamatPengiriman)
                                            <tr>
                                                <td>
                                                    {{$itemAlamatPengiriman->nama_penerima}}
                                                </td>
                                                <td>
                                                    {{$itemAlamatPengiriman->alamat}}
                                                    <br>
                                                    {{$itemAlamatPengiriman->kelurahan}}
                                                    ,
                                                    {{$itemAlamatPengiriman->kecamatan}}
                                                    <br>
                                                    {{$itemAlamatPengiriman->kota}}
                                                    ,
                                                    {{$itemAlamatPengiriman->provinsi}}
                                                    -
                                                    {{$itemAlamatPengiriman->kodepos}}
                                                </td>
                                                <td>
                                                    {{$itemAlamatPengiriman->no_tlp}}
                                                </td>
                                                <td>
                                                    <a href="{{route('alamatPengiriman.index')}}" class="btn btn-success btn-sm">
                                                        Ubah Alamat
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('alamatPengiriman.index')}}" class="btn btn-primary btn-sm">
                                Tambah Alamat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-4">
            <div class="card">
                <div class="card-header">
                    Ringkasan
                </div>
                <div class="card-body">
                    @if($message = Session::get('Ekspedisi'))
                        <div class="alert alert-success">
                            <p>
                                Ekspedisi berhasil ditambahkan
                            </p>
                        </div>
                    @endif
                    <table class="table">
                        <tr>
                            <td>No Invoice</td>
                            <td class="text-right">
                                {{$itemCart->no_invoice}}
                            </td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td class="text-right">
                                Rp. {{number_format($itemCart->subtotal, 2)}}
                            </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td class="text-right">
                                Rp. {{number_format($itemCart->total, 2)}}
                            </td>
                        </tr>
                        @if ($ongkir = Session::get('Ekspedisi'))
                            <tr>
                                <td>Ongkir</td>
                                <td>
                                    Rp. {{number_format($itemCart->ongkir, 2)}}
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>Ongkir</td>
                                <td class="text-right">
                                    Belum memilih ekspedisi
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
                <div class="card-footer">
                    <form action="{{route('transaksiUser.store')}}" method="post">
                        @csrf
                        <button type="Submit" class="btn btn-danger btn-block">
                            Buat Pesanan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection