@extends('admin.layouts.base')

@section('content')
<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Transaksi</b></h5>
</div>

<div class="card shadow bg-white">
    <div class="card-body">
        <table class="table table-bordered table-hover tabel-striped" id="dataTable">
             <thead>
                 <tr>
                    <th>No</th>
                    <th>Barang Sewa</th>
                    <th>Alamat</th>
                    <th>Tanggal Sewa</th>
                    <th>Metode Pembayaran</th>
                    <th>Total Harga Sewa</th>
                    <th>Tanggal Transaksi</th>
                    
                 </tr>
             </thead>
             <tbody>

             <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Rp</td>
                    <td></td>
                    
                </tr>

             </tbody>
        </table>
    </div>
</div>
@endsection