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
                    Silahkan cek ongkir terlebih dahulu
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">PROVINSI ASAL</label>
                        <select name="province_origin" id="province_origin" class="form-control provinsi-asal">
                            <option value="0">-- Pilih provinsi asal --</option>
                            @foreach ($provinsi as $p => $value)
                                <option value="{{$p}}"> {{$value}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">KOTA / KABUPATEN ASAL</label>
                        <select name="city_origin" id="city_origin" class="form-control kota-asal">
                            <option value="">-- Pilih kota asal --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">PROVINSI TUJUAN</label>
                        <select name="province_destination" id="province_destination" class="form-control provinsi-tujuan">
                            <option value="0">-- Pilih provinsi tujuan --</option>
                            @foreach ($provinsi as $p => $value)
                                <option value="{{$p}}"> {{$value}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">KOTA / KABUPATEN TUJUAN</label>
                        <select name="city_destination" id="city_destination" class="form-control kota-tujuan">
                            <option value="">--  Pilih kota tujuan--</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <label for="">KURIR</label>
                        <select name="courier" id="courier" class="form-control kurir">
                            <option value="o">-- Pilih kurir --</option>
                            <option value="jne">JNE</option>
                            <option value="pos">POS</option>
                            <option value="tiki">TIKI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">BERAT (GRAM)</label>
                        <input type="number" name="weight" id='weight' class="form-control" placeholder="Masukkan Berat (Gram)" value = "{{$produk}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-md btn-primary btn-block btn-check">CEK ONGKOS KIRIM</button>
                    </div>
                    <form action="{{route('transaksi.update', $itemCart->id_cart)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="ongkir" id="ongkir" value="">
                        <div class="form-group">
                            <label for="">Pilih kurir</label>
                            <select name="ekspedisi" id="ekspedisi" class="form-control">
                                <option value="">-- pilih ekspedisi --</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-info btn-block">PILIH KURIR</button>
                        </div>
                    </form>
                </div>
            </div>
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

@push('js')

<script>
    
</script>

@endpush