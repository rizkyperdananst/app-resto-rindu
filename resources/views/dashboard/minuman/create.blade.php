@extends('layouts.dashboard')
@section('title', 'Admin | Tambah Minuman')

@section('content')
<div class="container">
     <div class="row">
          <div class="col-md-12">
               <div class="card shadow">
                    <div class="card-header">
                         <h4>Tambah Minuman</h4>
                    </div>
                    <div class="card-body">
                         <form action="{{ route('minuman.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row mt-3 mb-3">
                                   <div class="col-md-6">
                                        <label for="gambar" class="form-label">Gambar</label>
                                        <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                                        @error('gambar')
                                            <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                        @enderror
                                   </div>
                                   <div class="col-md-6">
                                        <label for="nama" class="form-label">Nama Makanan</label>
                                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror">
                                        @error('nama')
                                            <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                        @enderror
                                   </div>
                              </div>
                              <div class="row mb-3">
                                   <div class="col-md-6">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror">
                                        @error('jumlah')
                                             <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                        @enderror
                                   </div>
                                   <div class="col-md-6">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror">
                                        @error('harga')
                                             <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                                        @enderror
                                   </div>
                              </div>
                              <div class="row mb-3">
                                   <div class="col-md-12">
                                        <button class="btn btn-primary float-end ms-3">Tambah</button>
                                        <a href="{{ route('minuman.index') }}" class="btn btn-secondary float-end">Kembali</a>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection