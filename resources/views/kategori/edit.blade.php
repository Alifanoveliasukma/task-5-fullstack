@extends('layouts.app')
 
@section('content')
 
 
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Kategori</div>
 
                <div class="card-body">
                    <form method="POST" action="{{$kategori->id}}/edit">
                        @csrf
 
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control" name="name" value="{{$kategori->name}}" required>
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