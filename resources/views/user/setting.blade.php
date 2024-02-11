@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-3 col-md-3"></div>
        <div class="col col-lg-6 col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img src="{{asset('assets/images/user1.jpg')}}" class="profile-user-img img-responsive img-circle">
                    </div>
                    <form action="#">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="file" id="foto" name="foto">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <form action="#">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">No. Tlp</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col col-lg-3 col-md-3"></div>
    </div>
</div>
@endsection