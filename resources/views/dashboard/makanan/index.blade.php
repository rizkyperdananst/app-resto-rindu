@extends('layouts.dashboard')
@section('title', 'Admin | Data Makanan')
    
@section('content')
<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between">
                    <h4>Data Makanan</h4>
                    <a href="#" class="btn btn-primary">Tambah</a>
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
                                <tr>
                                    <td>1</td>
                                    <td>Gambar</td>
                                    <td>Mie Ayam</td>
                                    <td>10</td>
                                    <td>15.000</td>
                                    <td>
                                        <span>Edit</span>
                                        <span>Hapus</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection