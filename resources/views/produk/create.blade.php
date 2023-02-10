@extends('layouts.produk')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
          </div><!-- /.col -->
        

<div class="container mb-5">
          <div class="row justify-content-center">
            <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="/store" method="POST" enctype="multipart/form-data">
                 @csrf
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Judul Produk</label>
    <input type="text" name="judulProduk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Deskripsi Produk</label>
    <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Harga Produk</label>
    <input type="number" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Gambar Produk</label>
    <input type="file" name="gambar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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