@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card mt-4">
                <div class="card-header">List All Post Artikel</div>
                  <a href="/web/artikel/tambah" method="post">Login Untuk Membuat Blog</a>
                  Sudah login ? klik <a href="/web/artikel/tambah" method="post">disini</a>
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Title</th>
                          {{-- <th scope="col">Content</th> --}}
                          <th scope="col">gambar</th>
                          {{-- <th scope="col">User ID</th> --}}
                          <th scope="col">Kategori ID</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($artikel as $a)
                          <tr>
                              <td>{{$a->title}}</td>
                              {{-- <td>{{$a->content}}</td> --}}
                              <td><img src="{{asset('images/'.$a->image)}}" width="100" height="100"></td>
                              {{-- <td>{{$a->user_id}} - {{$a->user->name}}</td> --}}
                              <td>{{$a->kategori_id}} - {{ $a->kategori->name}}</td>
                              <td><a href="/web/artikel/detail/{{$a->id}}">Detail</a></td>
                              {{-- <td>

                                <a href="/web/artikel/{{$a->id}}">Edit</a>|
                                <a href="/delete/{{$a->id}}">Delete</a>
                            </td> --}}
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                    <div class="pagination">
                      <span>{{$artikel->links()}}</span>
                   </div>
            </div>
          </div>
          <div class="card">
              <div class="card mt-4">
                <div class="card-header">Kategori</div>

                <a href="/web/kategori/tambah" method="post">TAMBAH KATEGORI</a>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">User</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($kategori as $a)
                            <tr>
                                <td>{{$a->id}}</td>
                                <td>{{$a->name}}</td>
                                <td>{{$a->user->name}}</td>
                                <td>
                                  <a href="/web/kategori/{{$a->id}}">Edit</a>|
                                  <a href="/delete/kategori/{{$a->id}}">Delete</a>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>           
        </div>
    </div>
</div>

@endsection
