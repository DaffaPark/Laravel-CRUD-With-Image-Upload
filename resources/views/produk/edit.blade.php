@extends('layouts.produk')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Edit Produk</li>
            </ol>
          </div><!-- /.col -->
        

<div class="container mb-5">
          <div class="row justify-content-center">
            <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                 @csrf
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Judul Produk</label>
    <input type="text" name="judulProduk" value="{{$data->judulProduk}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Deskripsi Produk</label>
    <input type="text" name="deskripsi" value="{{ $data->deskripsi }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Harga Produk</label>
    <input type="number" name="harga" value="{{ $data->harga }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Gambar Produk</label>
    <input type="file" name="gambar" class="form-control" placeholder="Post Title">
                @error('gambar')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">
              <img src="{{ asset('foto/'.$data->gambar) }}" height="200" width="200" alt="" />
            </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection