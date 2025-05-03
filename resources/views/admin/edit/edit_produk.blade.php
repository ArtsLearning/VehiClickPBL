@extends('admin.layouts.base')

@section('content')
<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Edit Produk</b></h5>
</div>

<form method="post" enctype="multipart/form-data">
    <div class="card shadow ng-white">
        <div class="card-body">

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Kategori :</label>
            <div class="col-sm-9">
                <select name="id_kategori" class="form-control">
                    <option value=""></option>
                    </option>
                    <option value="">
                    </option>  
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Barang :</label>
            <div class="col-sm-9">
                <input type="text" name="barang" class="form-control" value="" >
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Harga Sewa :</label>
            <div class="col-sm-9">
                <input type="text" name="harga" class="form-control" value="" >
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Ukuran :</label>
            <div class="col-sm-9">
                <input type="text" name="ukuran" class="form-control" value="" >
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Stok :</label>
            <div class="col-sm-9">
                <input type="text" name="stok" class="form-control" value="" >
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Warna :</label>
            <div class="col-sm-9">
                <input type="text" name="warna" class="form-control" value="" >
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Foto Produk :</label>
            <div class="col-sm-9">
                <img src="../assets/foto_produk/" width="150">
                <input type="file" name="foto[]" class="form-control" >
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Deskripsi :</label>
            <div class="col-sm-9">
                <textarea type="text" name="deskripsi" class="form-control"></textarea>
            </div>
        </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-11">
                    <button name="simpan" class="btn btn-sm btn-success">Simpan</button>
                </div>
                <div class="col-md-1 text-right">
                    <a href="{{ route('produk') }}" class="btn btn-sm btn-danger">Kembali</a>
                </div>
            </div>
    </div>
</form>
@endsection