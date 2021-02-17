@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Master Penjualan')
@section('title', ' Data Master Penjualan')
<div class="card">
    <div class="card-header">
        <a href="/beli/index" class="btn btn-primary"><i class="fa fa-plus"> Tambah</i></a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nobukti</th>
                    <th>Sataun</th>
                    <th>Tanggal</th>
                    <th>qty</th>
                    <th>harga</th>
                    <th>total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1 ?>
                @foreach($master as $master)
                <tr>
                    <td width='50px' class="text-center"><?= $i++; ?></td>
                    <td> <?= $master->nobukti; ?>
                    </td>
                    <td><?= $master->name_satuan; ?></td>
                    <td><?= $master->tgl; ?></td>
                    <td class="text-center"><?= $master->qty; ?></td>
                    <td><?= 'Rp ' . (number_format($master->hrgbeli, 0)) ?></td>
                    <td><?= 'Rp ' .  (number_format($master->subtotal, 0)) ?></td>
                    <td>
                        <a href="/master/print/<?= $master->nobukti; ?>" target="_blank" class="btn btn-s btn-warning"><i class="fa fa-print fa-xs"></i> Cetak</a>
                    </td>
                </tr>
            </tbody>
            @endforeach()
        </table>
    </div>
</div>
@endSection()
