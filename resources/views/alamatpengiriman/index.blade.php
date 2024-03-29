@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-8 mb-2">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                Alamat Pengiriman
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('checkout.checkout') }}" class="btn btn-danger btn-sm">
                                    Tutup
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <th>Alamat</th>
                                        <th>No tlp</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($itemAlamatPengiriman as $pengiriman)
                                        <tr>
                                            <td>
                                                {{ $pengiriman->nama_penerima }}
                                            </td>
                                            <td>
                                                {{ $pengiriman->alamat }} <br>
                                                {{ $pengiriman->kelurahan }} , {{ $pengiriman->kecamatan }} <br>
                                                {{ $pengiriman->kota }}, {{ $pengiriman->provinsi }} -
                                                {{ $pengiriman->kodepos }}
                                            </td>
                                            <td>
                                                {{ $pengiriman->no_tlp }}
                                            </td>
                                            <td>
                                                <form action="{{ route('alamatPengiriman.update', $pengiriman->id_alamat_pengiriman)}}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    @if ($pengiriman->status == 1)
                                                        <button type="submit" class="btn btn-primary btn-sm" disabled>
                                                            Set Utama
                                                        </button>
                                                    @else
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            Set Utama
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">
                                {{ $itemAlamatPengiriman->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-2">
                <div class="card">
                    <div class="card-header">
                        Form Alamat Pengiriman
                    </div>
                    <div class="card-body">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-warning "> <small> {{$error}} </small>  </div>
                            @endforeach
                        @endif
                        @if($message = Session::get('error'))
                            @foreach($errors->all() as $error)
                                <div class="alert alert-warning"> 
                                    <small> {{$message}} </small>
                                </div>
                            @endforeach
                        @endif
                        @if($message = Session::get('Success'))
                            @foreach($errors->all() as $error)
                                <div class="alert alert-success"> 
                                    <small> {{$message}} </small>
                                </div>
                            @endforeach
                        @endif
                        <form action="{{ route('alamatPengiriman.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama_penerima">Nama Penerima</label>
                                        <input type="text" name='nama_penerima' class="form-control"
                                            value={{ old('nama_penerima') }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name='alamat' class="form-control" value={{ old('alamat') }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_tlp">No Tlp</label>
                                        <input type="text" name='no_tlp' class="form-control" value={{ old('no_tlp') }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" name='provinsi' class="form-control" value={{ old('provinsi') }}>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kota">Kota</label>
                                        <input type="text" name='kota' class="form-control" value={{ old('kota') }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" name='kecamatan' class="form-control"
                                            value={{ old('kecamatan') }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelurahan">Kelurahan</label>
                                        <input type="text" name='kelurahan' class="form-control"
                                            value={{ old('kelurahan') }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="kodepos">Kode Pos</label>
                                        <input type="text" name='kodepos' class="form-control" value={{ old('kodepos') }}>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
