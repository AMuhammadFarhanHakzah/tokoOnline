@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        {{-- tabel Kategori --}}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Kategori produk
                        </h4>
                        <div class="card-tools">
                            <a href="{{ route('kategori.create') }}" class="btn btn-lg btn-primary">Baru</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori.cari') }}" method="GET">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name='key' id='key' class='form-control'
                                        placeholder='ketik key disini' value="{{$cari ?? ''}}">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        @if($message = Session::get('error'))
                            <div class="alert alert-danger">
                                {{ $message  }}
                            </div>
                        @endif
                        @if($message = Session::get('Success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Gambar</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Jumlah Produk</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($items as $item)
                                        <tr>
                                            <td>{{ $no++ }} </td>
                                            <td>
                                                <img src="{{ asset($item->foto) }}" alt="" width="150px">
                                            </td>
                                            <td> {{$item->kode_kategori}} </td>
                                            <td> {{$item->nama_kategori}} </td>
                                            <td> {{count($item->produk)}} </td>
                                            <td> {{$item->status}} </td>
                                            <td>
                                                <a href="{{ route('kategori.edit', $item->id_kategori) }}"
                                                    class='btn btn-sm btn-primary mr-2 mb-2'>Edit</a>
                                                <form action="{{route('kategori.destroy', $item->id_kategori)}}" method="POST" style='display: inline'>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger mb-2" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                        Hapus
                                                    </button>
                                                
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">
                                            <div class="alert alert-warning text-center">Data yang anda cari tidak tersedia</div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $items->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
