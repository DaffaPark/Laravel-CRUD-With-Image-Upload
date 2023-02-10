@extends('layouts.produk')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat Datang di Halaman Dashboard School Gallery SMKN 2 Banjarmasin
                </div>
            </div>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-text">{{ $data }}</h5>
                    <h6 class="card-text">Produk</h6>
                </div>
            </div>
    </div>
</div>

@endsection
