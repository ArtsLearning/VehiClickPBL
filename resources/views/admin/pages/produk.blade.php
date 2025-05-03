@extends('admin.layouts.base')

@section('content')
<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Produk</b></h5>
</div>

<a href="{{ route('admin.produk.create') }}" class="btn btn-sm btn-success">Tambah</a>

<div class="card shadow bg-white mt-3">
    <div class="card-body">
        <table class="table table-bordered table-hover tabel-striped" id="dataTable">
             <thead>
                 <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Barang</th>
                    <th>Harga Sewa</th>
                    <th>Ukuran</th>
                    <th>Stok</th>
                    <th>Warna</th>
                    <th>Foto</th>
                    <th>Opsi</th>
                 </tr>
             </thead>
             <tbody>

             <tr>
                    <td width="50"></td>
                    <td></td>
                    <td></td>
                    <td>Rp</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <img width ="150" src="../assets/foto_produk/">
                    </td>
                    <td class="text-center" width="150">
                        <a href="{{ route('admin.produk.edit') }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="index.php?halaman=hapus_produk&id=" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
             </tbody>
        </table>
    </div>
</div>
@endsection