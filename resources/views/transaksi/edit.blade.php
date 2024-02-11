@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8 col-md-8 mb-2">
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
                                <tr>
                                    <td>1</td>
                                    <td>KATE-1</td>
                                    <td>Baju Anak</td>
                                    <td>Rp. 15.000</td>
                                    <td class="text-right">2</td>
                                    <td class="text-right">Rp. 30.000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>KATE-2</td>
                                    <td>Baju Anak</td>
                                    <td>Rp. 25.000</td>
                                    <td class="text-right">2</td>
                                    <td class="text-right">Rp. 50.000</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>KATE-3</td>
                                    <td>Baju Anak</td>
                                    <td>Rp. 35.000</td>
                                    <td class="text-right">2</td>
                                    <td class="text-right">Rp. 70.000</td>
                                </tr>
                                <tr>
                                    <td colspan='5'>
                                        <b>Total</b>
                                    </td>
                                    <td clsas='text-right'>
                                        <b>Rp. 150.000</b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('transaksi.index')}}" class="btn btn-danger">Tutup</a>
                </div>
            </div>
        </div>
        <div class="col col-lg-4 col-md-4 mb-2">
            <div class="table-responsive">
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Total</td>
                                <td>
                                    <input type="text" id="total" name='total' class="form-control" value='127.000'>
                                </td>
                            </tr>
                            <tr>
                                <td>Subtotal</td>
                                <td>
                                    <input type="text" id="subtotal" name="subtotal" class="form-control" value='150.000'>
                                </td>
                            </tr>
                            <tr>
                                <td>Diskon</td>
                                <td>
                                    <input type="text" id="diskon" name="diskon" class="form-control" value="0">
                                </td>
                            </tr>
                            <tr>
                                <td>Ongkir</td>
                                <td>
                                    <input type="text" id="ongkir" name="ongkir" class="form-control" value="27.000">
                                </td>
                            </tr>
                            <tr>
                                <td>Ekspedisi</td>
                                <td>
                                    <input type="text" id="ekspedisi" name="ekspedisi" class="form-control" value="JNE">
                                </td>
                            </tr>
                            <tr>
                                <td>No. Resi</td>
                                <td>
                                    <input type="text" id="no. resi" name="no. resi" class="form-control" value="127831238143">
                                </td>
                            </tr>
                            <tr>
                                <td>Status Pembayaran</td>
                                <td>
                                    <select name="status" id="status" class="form-control">
                                        <option value="sudah">Sudah Dibayar</option>
                                        <option value="belum">Belum Dibayar</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <select name="status" id="status" class="form-control">
                                        <option value="checkout">Checkout</option>
                                        <option value="Diproses">Diproses</option>
                                        <option value="Dikirim">Dikirim</option>
                                        <option value="Diterima">Diterima</option>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection