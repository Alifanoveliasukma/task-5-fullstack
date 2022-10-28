@extends('layouts.app')
 
@section('content')
 
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Artikel</div>
 
                <div class="card-body">
                    <form method="POST" action="/store" enctype="multipart/form-data">
                        @csrf
 
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <input type="text" class="form-control" name="content" value="{{ old('content') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" value="{{ old('images') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="position-option">Kategori ID</label>
                                <select class="form-control" id="position-option" name="kategori_id" required>
                                @foreach ($kategori as $a)
                                    <option value="{{ $a->id }}">{{ $a->id }} - {{ $a->name }}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    <a href="/home">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection