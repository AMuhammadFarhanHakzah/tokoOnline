@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <H3>Data Customer</H3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="#">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id='keyword' placeholder='Ketik Keyword Disini'>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. Telepon</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Amin</td>
                                        <td>amin@gmail.com</td>
                                        <td>002145671234</td>
                                        <td>Jln. Jenderal Sudirman no.1, Kudus</td>
                                        <td>Aktif</td>
                                        <td><a href="{{route('customer.edit', 2)}}" class="btn btn-sm btn-primary">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Amin</td>
                                        <td>amin@gmail.com</td>
                                        <td>002145671234</td>
                                        <td>Jln. Jenderal Sudirman no.1, Kudus</td>
                                        <td>Aktif</td>
                                        <td><a href="{{route('customer.edit', 2)}}" class="btn btn-sm btn-primary">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Amin</td>
                                        <td>amin@gmail.com</td>
                                        <td>002145671234</td>
                                        <td>Jln. Jenderal Sudirman no.1, Kudus</td>
                                        <td>Aktif</td>
                                        <td><a href="{{route('customer.edit', 2)}}" class="btn btn-sm btn-primary">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Amin</td>
                                        <td>amin@gmail.com</td>
                                        <td>002145671234</td>
                                        <td>Jln. Jenderal Sudirman no.1, Kudus</td>
                                        <td>Aktif</td>
                                        <td><a href="{{route('customer.edit', 2)}}" class="btn btn-sm btn-primary">Edit</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection