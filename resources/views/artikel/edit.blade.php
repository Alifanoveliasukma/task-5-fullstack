@extends('layouts.app')
 
@section('content')
 
 
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Artikel</div>
 
                <div class="card-body">
                    <form method="POST" action="{{$artikel->id}}/edit" enctype="multipart/form-data">
                        @csrf
 
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{$artikel->title}}" required>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <input type="text" class="form-control" name="content" value="{{$artikel->content}}" required>
                        </div>
                        <div class="form-group">
                            <td><img src="{{asset('images/'.$artikel->image)}}" width="100" height="100"></td>
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control" name="image" value="{{$artikel->image}}" required>
                        </div>
                        <div class="form-group">
                            <label for="position-option">Kategori ID</label>
                                <select class="form-control" id="position-option" name="kategori_id" value="{{$artikel->kategori->kategori_id}}" required>
                                @foreach ($kategori as $a)
                                    <option value="{{ $a->id }}">{{ $a->id }} - {{ $a->name }}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Simpan</button>
                            <button class="btn btn-primary"><a href="/home"></a>Kembali</button>
                        </div>
 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection