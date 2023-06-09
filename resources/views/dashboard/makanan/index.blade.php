@extends('layouts.dashboard')
@section('title', 'Admin | Data Makanan')
    
@section('content')
<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between">
                    <h4>Data Makanan</h4>
                    <a href="{{ route('makanan.create') }}" class="btn btn-primary">Tambah</a>
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
                                @foreach ($makanans as $m)                                 
                                <tr>
                                    <td>1</td>
                                    <td><img src="{{ url('storage/makanans/'. $m->gambar) }}" width="150" class="img img-fluid" alt="Gambar Makanan"></td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->jumlah }}</td>
                                    <td>{{ $m->harga }}</td>
                                    <td width="16%">
                                        <a href="{{ route('makanan.edit', $m->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('makanan.destroy', $m->id) }}" method="POST" class="d-inline">
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
</div>
@endsection