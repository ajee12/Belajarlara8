@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Penjualan')
@section('title', ' Data Master Penjualan')
<div class="card">
    <div class="card-header">
        <a href="/persediaan/tambah_persediaan" class="btn btn-primary">Tambah Persediaan</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nobukti</th>
                    <th>Nama Pelanggan</th>
                    <th>Satuan</th>
                    <th>qty</th>
                    <th>harga</th>
                    <th>total</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>


                @foreach($detail_barang as $db)
                <tr>
                    <td width='50px' class="text-center"><?= $i++; ?></td>
                    <td><?= $db->nobukti; ?>
                    </td>
                    <td><?= $db->qty; ?></td>
                    <td><?= $db->hrgbeli; ?></td>
                    <td><?= $db->subtotal; ?></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nobukti</th>
                    <th>Nama Pelanggan</th>
                    <th>Satuan</th>
                    <th>qty</th>
                    <th>harga</th>
                    <th>total</th>
                </tr>
            </tfoot>
        </table>
        @endSection()
