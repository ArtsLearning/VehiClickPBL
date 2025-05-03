@extends('admin.layouts.base')

@section('content')
<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Admin</b></h5>
</div>

<div class="card shadow bg-white mt-3">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Toko :</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Pengguna :</label>
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password :</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" placeholder="kosongkan password jika tidak diubah">
                            <small class="text-danger">Kosongkan password jika tidak diubah</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Konfirmasi Password :</label>
                        <div class="col-sm-9">
                            <input type="password" name="konfirmasi" class="form-control" placeholder="Konfirmasi password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9 d-flex gap-2">
                            <button name="update" class="btn btn-sm btn-primary">Update</button>
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <img src="../assets/upload_foto/" class="img-thumbnail img-responsive" width="250">
                    <input type="file" name="foto" class="form-control mt-2">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection