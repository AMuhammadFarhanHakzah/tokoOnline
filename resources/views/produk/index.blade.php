@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Produk
                    </h4>
                    <div class="card-tools">
                        <a href="{{route('produk.create')}}" class="btn btn-lg btn-primary">Baru</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('produk.cari')}}" method="GET">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" name='key' id='key' placeholder="Ketik Keyword Disini" value="{{$cari ?? ''}}">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @if($message = Session::get('Success'))
                        <div class="alert alert-success" role='alert'>
                            {{$message}}
                        </div>
                    @endif
                    @if($message = Session::get('error'))
                        <div class="alert alert-danger" role='alert'>
                            {{$message}}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th width='50px'>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;   
                                @endphp
                                @forelse ($items as $i)
                                <tr>
                                    <td> {{$no++}} </td>
                                    <td> {{$i->kode_produk}} </td>
                                    <td> {{$i->nama_produk}} </td>
                                    <td> {{$i->qty}} {{$i->satuan}} </td>
                                    <td> Rp. {{number_format($i->harga - ($i->harga / 100 * $i->diskon), 2)}} 
                                        @if($i->diskon>0) 
                                            <br> <del> Rp. {{number_format($i->harga, 2)}} </del>
                                        @endif
                                    </td>
                                    <td> {{$i->diskon}} % </td>
                                    <td> {{$i->status}} </td>
                                    <td>
                                        <a href="{{route('produk.show', $i->id_produk)}}" class="btn btn-primary btn-sm mb-2">Detail</a>
                                        <a href="{{route('produk.edit', $i->id_produk)}}" class='btn btn-primary btn-sm mb-2'>Edit</a>
                                        <form action="{{route('produk.destroy', $i->id_produk)}}" method="POST" style="display: inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger mb-2" onclick="return confirm('Apakah anda yakin ingin menghapus data produk ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan='9'>
                                        <div class="alert alert-warning text-center" role='alert'>
                                            Data tidak ada
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection