@extends('admin.layouts.base')

@section('content')
<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Kategori</b></h5>
</div>

<a href="{{ route('admin.kategori.create') }}" class="btn btn-sm btn-success">Tambah</a>

<div class="card shadow bg-white mt-3">
    <div class="card-body">
        <table class="table table-bordered table-hover tabel-striped" id="dataTable">
             <thead>
                 <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Opsi</th>
                 </tr>
             </thead>
             <tbody>

                <tr>
                    <td width="50"></td>
                    <td></td>
                    <td class="text-center" width="150">
                        <a href="{{ route('admin.kategori.edit') }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="index.php?halaman=hapus_kategori&id=" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
             </tbody>
        </table>
    </div>
</div>
@endsection