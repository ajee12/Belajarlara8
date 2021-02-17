@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Beli')
@section('title','Welcome table Pembelian')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Master</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/beli/save_beli" method="POST" enctype="multipart/form-data">
                        @csrf

                        <?php $iduser = '001';
                        $str_time = date('ymdHis');
                        $nobuk = "BL" . "$iduser" . "$str_time"; ?>

                        <div class="row">
                            <div class="col-sm-4 m-lg-3">
                                <label></label>
                                <label>No Bukti</label>
                                <input type="" value="<?= $nobuk ?>" class="form-control " id="nobukti" name="nobukti" autofocus value="<?= old('nobukti'); ?>" readonly></input>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <div class="form-group">
                                    <label>Nama Pemasok</label>
                                    <select type="" class="form-control " id="id_pemasok" name="id_pemasok">
                                        <option value="">--Pilih Nama Pemasok--</option>
                                        @foreach($pemasok as $pm)
                                        <option value="<?= $pm->id; ?>"><?= $pm->name; ?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-10 m-lg-3">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="waktu" class="form-control " id="keterangan" name="keterangan" autofocus value="<?= old('keterangan'); ?>" placeholder="Nama Pelanggan" required></input>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->


                </div>
            </div>

            <!-- /.card -->
            <?php
            $tanggal = date('y/m/d');
            ?>
            <!-- /.card-header -->
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Master</h3>
                    </div>
                    <div class="card-body">
                        <!-- Date range -->
                        <div class="form-group">
                            <label>Tanggal</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>

                                <input type="" value="<?= $tanggal; ?>" class="form-control float-right" id="tgl" name="tgl">

                            </div>
                            <!-- /.input group -->
                        </div>

                    </div>
                </div>
            </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Detail</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="row">
                        <div class="col-sm-4 m-lg-3">
                            <label>Nama Stok</label>
                            <select type="" class="form-control " id="id_stok" name="id_stok">
                                <option value="">--Pilih Nama Stok--</option>
                                @foreach($satuan as $st)
                                <option value="<?= $st->id; ?>"><?= $st->name_satuan; ?></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2 mt-3">
                            <div class="form-group">
                                <label>qty</label>
                                <input type="" class="form-control " id="qty" name="qty" autofocus value="<?= old('qty'); ?>" placeholder="quality" required></input>
                            </div>
                        </div>
                        <div class="col-sm-3 mt-3">
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="" class="form-control " id="hrgbeli" name="hrgbeli" autofocus value="<?= old('hrgbeli'); ?>" placeholder="Harga" required></input>
                            </div>
                        </div>
                        <div class=" col-sm-2 mt-3">
                            <div class="form-group">
                                <label>Action</label>
                                <button type="submit" class="form-control btn btn-success">Simpan</button>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
</section>
@if (session('sukses'))
<div class="alert alert-success mt-2" role="alert">
    {{session('sukses') }}.
    @endif
    @if (session('danger'))
    <div class="alert alert-danger mt-2" role="alert">
        {{session('danger') }}.
        @endif
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Detail</h3>
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th class="nomor" width="50px">No</th>
                                    <th>Nama Stok</th>

                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            <tbody>
                                <?php $n = 1;

                                $jml = 0;
                                ?>
                                @foreach($detail_barang as $db)
                                <?php

                                // $db->subtotal = null;
                                // $db->subtotal = $db->qty * $db->hrgbeli;
                                $jml =  $jml + ($db->qty * $db->hrgbeli);
                                $hasil_rupiah = "Rp " . number_format($db->hrgbeli, 0);
                                $hasil_semua = "Rp " . number_format($db->subtotal, 0);
                                $hasil_jml = "Rp " . number_format($jml, 0);

                                ?>
                                <tr>
                                    <td class="text-center"><?= $n++; ?></td>
                                    <td><?= $db->name_satuan ?></td>
                                    <td class="text-center"><?= $db->qty; ?></td>
                                    <td class="text-center"><?= $hasil_rupiah; ?></td>
                                    <td class="text-center">
                                        <?= $hasil_semua; ?>
                                    </td>
                                    <td class="text-center">
                                        <form action="/beli/delete/<?= $db->nobukti; ?>" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger d-inline " onclick="return confirm('apakah anda yakin?');"><i class="fas fa-fw fa-trash"></i></button>
                                        </form>
                                        <a href="/beli/e_beli/<?= $db->nobukti; ?>" type="submit" class="btn btn-warning"><i class="fa  fa-pencil">Edit</i></a>
                                        <a href="/beli/print/<?= $db->nobukti; ?>" target="_blank" class="btn btn-s btn-info"><i class="fa fa-print fa-xs"></i> Cetak</a>
                                    </td>
                                </tr>
                                @endforeach()
                                </thead>
                            <tfoot class="text-center">
                                <tr>
                                    <th colspan="4">Total :</th>
                                    <th colspan="2">
                                        <?php if (empty($hasil_jml)) {
                                            echo '0';
                                        } else {
                                            echo $hasil_jml;
                                        }
                                        ?>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
    @endSection()
