@extends('admin.layouts.base')

@section('content')
<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Tambah Produk</b></h5>
</div>


<form method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-body">

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Kategori: </label>
            <div class="col-sm-9">
                <select name="id_kategori" class="form-control" require>
                    <option selected disabled>Pilih Nama Kategori </option>                    
                        <option value="">
                        </option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Barang: </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="barang" placeholder="Masukkan Nama Barang">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Harga Sewa: </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga Sewa">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Ukuran: </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="ukuran" placeholder="Masukkan Ukuran">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Stok: </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="stok" placeholder="Masukkan Stok">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Warna: </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="warna" placeholder="Masukkan Warna">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Foto Produk:</label>
            <div class="col-sm-9">
                <div class="input-foto"></div>
                <input type="file" class="form-control" name="foto[]" required>
                <div class="mt-3 text-end">
                    <button type="button" class="btn btn-sm btn-success btn-tambah">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Deskripsi Produk: </label>
            <div class="col-sm-9">
                <textarea type="text" class="form-control" name="deskripsi" placeholder="Masukkan Nama Barang"></textarea>
            </div>
        </div>
        </div>
        <div class="card footer">
            <div class="row">
                <div class="col-md-11">
                <button name="simpan" class="btn btn-sm btn-success">Simpan</button>
                </div>
                <div class="col-md-1 text-right">
                    <a href="{{ route('produk') }}" class="btn btn-sm btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection