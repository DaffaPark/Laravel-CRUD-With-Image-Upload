@extends('layouts.produk')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Produk</h1>
          </div><!-- /.col -->                              
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Data Produk</li>
            </ol>
          </div>
 
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="row">
            @if ($message = Session::get('Sukses'))
            <div class="alert alert-info" role="alert">
              {{ $message }}
            </div>
          
            @endif
        </div>
    </div>
</div>



 <div class="card-body">
 <a href="/create" class="btn btn-primary m-4">Tambah</a>
<table id="status" class="table table-striped table-bordered">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Judul Produk</th>
      <th scope="col">Deskripsi Produk</th>
      <th scope="col">Harga</th>
      <th scope="col">Gambar</th>    
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @php
      $no = 1;
    @endphp

    @foreach($data as $row)
    <tr>
      <th scope="row">{{ $no++ }}</th>
      <td>{{ $row->judulProduk }}</td>
      <td>{{ $row->deskripsi }}</td>
      <td>{{ $row->harga }}</td>
      <td><img src="{{ asset('foto/'.$row->gambar) }}" width="50px"></td>
      <td>
        <a href="/edit/{{ $row->id }}" class="btn btn-dark ">Status</a>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Hapus
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Apa Anda Yakin Ingin Menghapus Data Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="/hapus/{{ $row->id }}" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
        
      </td>
    </tr>

    @endforeach
    
  </tbody>
</table>
</div>
</div>
</div>
</div>

@endsection