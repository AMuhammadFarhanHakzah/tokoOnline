@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Slideshow</h4>
                    </div>
                    <div class="card-body">
                        @if($message = Session::get('Success'))
                            <div class="alert alert-success" role='alert'>
                                <p> {{$message}} </p>
                            </div>
                        @endif
                        @if($message = Session::get('error'))
                            <div class="alert alert-warning" role='alert'>
                                <p> {{$message}} </p>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th width='50px'>No</th>
                                    <th>Gambar</th>
                                    <th>Title</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @forelse($itemSlideshow as $slide)
                                        <tr>
                                            <td> {{++$no}} </td>
                                            <td> <img src="{{asset($slide->foto)}}" alt="{{$slide->caption_title}}" width="250px" class="img-thumbnail mb-2"> </td>
                                            <td> {{$slide->caption_title}} </td>
                                            <td>
                                                <form action="{{route('slideshow.destroy', $slide->id_slideshow)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mb-2">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan='4'>
                                                <div class="alert text-secondary text-center mt-3" role='alert'>
                                                    Slideshow tidak ada
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{$itemSlideshow->links()}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <form action="{{route('slideshow.store')}}" method="POST" enctype='multipart/form-data'>
                                    @csrf
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <br>
                                        <input type="file" name="foto" id="foto">
                                    </div>
                                    <div class="form-group">
                                        <label for="caption_title">Title</label>
                                        <input type="text" name="caption_title" id="caption_title" class='form-control'>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection