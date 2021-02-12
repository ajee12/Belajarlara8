@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Edit Beli')
@section('title','Welcome Edit Beli')
<form action="/beli/edit_save/<?= $pengguna->nobukti; ?>" method="POST" enctype="multipart/form-data">
    @csrf
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Master</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="row">
                            <div class="col-sm-4 m-lg-3">
                                <label></label>
                                <label>No Bukti</label>
                                <input type="" value="<?= $pengguna->nobukti; ?>" class="form-control " id="nobukti" name="nobukti" autofocus value="<?= old('nobukti'); ?>" readonly></input>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <div class="form-group">
                                    <label>Nama Pemasok</label>
                                    <select type="" class="form-control " id="id_pemasok" name="id_pemasok">
                                        <option value="<?= $pengguna->id_pemasok; ?>"><?= $pengguna->name; ?></option>
                                        @foreach($pemasok as $pm)
                                        <option value="<?= $pm->id; ?>"><?= $pm->name; ?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-10 m-lg-3">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" value="<?= $pengguna->keterangan; ?>" class="form-control " id="keterangan" name="keterangan" autofocus value="<?= old('keterangan'); ?>" placeholder="Nama Pelanggan" required></input>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->


                    </div>
                </div>

                <!-- /.card -->

                <!-- /.card-header -->
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Edit Master</h3>
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

                                    <input type="" value="<?= $pengguna->tgl; ?>" class="form-control float-right" id="tgl" name="tgl" readonly>

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
                            <h3 class="card-title">Edit Detail Beli</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="row">
                            <div class="col-sm-4 m-lg-3">
                                <label>Nama Stok</label>
                                <select type="" class="form-control " id="id_stok" name="id_stok">
                                    <option value="<?= $pengguna->id_stok; ?>"><?= $pengguna->name_satuan; ?></option>
                                    @foreach($satuan as $st)
                                    <option value="<?= $st->id; ?>"><?= $st->name_satuan; ?></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2 mt-3">
                                <div class="form-group">
                                    <label>qty</label>
                                    <input type="number" value="<?= $pengguna->qty; ?>" class="form-control " id="qty" name="qty" autofocus value="<?= old('qty'); ?>" placeholder="quality" required></input>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-3">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="" value="<?= $pengguna->hrgbeli; ?>" class="form-control " id="hrgbeli" name="hrgbeli" autofocus value="<?= old('hrgbeli'); ?>" placeholder="Harga" required></input>
                                </div>
                            </div>
                            <div class=" col-sm-2 mt-3">
                                <div class="form-group">
                                    <label>Action</label>
                                    <button type="submit" class="form-control btn btn-warning">Edit</button>
                                </div>
                            </div>
                            <!-- /.card-body -->


                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
    </section>
</form>
@endSection()
