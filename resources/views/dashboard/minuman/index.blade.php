@extends('layouts.dashboard')
@section('title', 'Admin | Data Minuman')

@section('content')
<div class="row mt-3 mb-3">
     <div class="col-md-12">
         @if (session('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ session('success') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
         @endif 
     </div>
</div>
<div class="row mt-3 mb-3">
     <div class="col-md-12">
          <div class="card shadow">
               <div class="card-header d-flex justify-content-between">
                    <h4>Data Minuman</h4>
                    <a href="{{ route('minuman.create') }}" class="btn btn-primary">Tambah</a>
               </div>
               <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-boredered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($minumans as $m)                                 
                                <tr>
                                    <td>1</td>
                                    <td><img src="{{ url('storage/minumans/'. $m->gambar) }}" width="150" class="img img-fluid" alt="Gambar Minuman"></td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->jumlah }}</td>
                                    <td>{{ $m->harga }}</td>
                                    <td width="16%">
                                        <a href="{{ route('minuman.edit', $m->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('minuman.destroy', $m->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
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