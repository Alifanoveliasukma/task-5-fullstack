@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card mt-4">
                <div class="card-header">Artikel</div>           
                    <div class="card mb-3">
                        <img src="{{asset('images/'.$artikel->image)}}" width="150%" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$artikel->title}}</h5>
                                <p class="card-text">{{$artikel->content}}</p>
                                <p class="card-text"><small class="text-muted">{{$artikel->created_at}}</small></p>
                                <p class="card-text"><small class="text-muted">Dibuat Oleh: {{ $artikel->user->name}}</small></p>
                            </div>
                            <button type="button" class="btn btn-info"><a href="/home">Kembali</a></button>
                            <button type="button" class="btn btn-warning"><a href="/web/artikel/{{$artikel->id}}">Edit</a></button>
                            <button type="button" class="btn btn-danger"><a href="/delete/artikel/{{$artikel->id}}">Delete</a></button>
                    </div>
                   
              
            </div>
          </div>         
        </div>
    </div>
</div>

@endsection
