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
                        <form action="{{ route('customer.cari') }}" method="GET">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id='key' name="key"
                                        placeholder='Cari nama, telepon, status dan email'>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">Cari</button>
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
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php
                                        $no = 1;
                                    @endphp --}}
                                    @foreach ($itemCustomer as $customer)
                                        @if ($customer->role != 'admin')
                                            <tr>
                                                <td> {{ $no++ }} </td>
                                                <td> {{ $customer->name }} </td>
                                                <td> {{ $customer->email }} </td>
                                                <td> {{ $customer->telepon }} </td>
                                                <td> {{ $customer->status }} </td>
                                                <td><a href="{{ route('customer.edit', $customer->id_user) }}"
                                                        class="btn btn-sm btn-primary">Edit</a></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
