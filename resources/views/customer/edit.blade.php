@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-3 col-md-3"></div>
            <div class="col col-lg-6 col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Customer</h3>
                        <div class="card-tools">
                            <a href="{{ route('customer.index') }}" class="btn btn-danger">Tutup</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.update', $itemCustomer->id_user) }}" method="post">
                            @csrf
                            @method('PUT')
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td> {{ $itemCustomer->name }} </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td> {{ $itemCustomer->email }} </td>
                                    </tr>
                                    <tr>
                                        <td>No. Telepon</td>
                                        <td>{{ $itemCustomer->telepon }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <form action="#" class="form-inline">
                                                <div class="form-group mr-2">
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="aktif"
                                                            {{ $itemCustomer->status === 'aktif' ? 'selected' : '' }}>Aktif
                                                        </option>
                                                        <option value="tidakaktif"
                                                            {{ $itemCustomer->status === 'tidakaktif' ? 'selected' : '' }}>
                                                            Non
                                                            Aktif</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-md-3"></div>
        </div>
    </div>
@endsection
