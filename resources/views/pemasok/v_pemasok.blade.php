@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Pemasok')
@section('title','Welcome table Pemasok')
@if (session('sukses'))
<div class="alert alert-success mt-2" role="alert">
    {{session('sukses') }}.
</div>
@endif
@if (session('danger'))
<div class="alert alert-danger mt-2" role="alert">
    {{session('danger') }}.
</div>
@endif
<div class="card">
    <div class="card-header">
        <a href="/pemasok/tambah_pemasok" class="btn btn-primary">Tambah Pelanggan</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Name</th>
                    <th>Alamat</th>
                    <th>NoTelpon</th>
                    <th>Pimpinan</th>
                    <th>Admin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pemasok as $ps)
                <tr>
                    <td width='50px' class="text-center"><?= $ps->kode; ?></td>
                    <td>
                        <?= $ps->name; ?>
                    </td>
                    <td><?= $ps->alamat; ?></td>
                    <td><?= $ps->telp; ?> </td>
                    <td><?= $ps->namapimpinan; ?></td>
                    <td><?= $ps->namaadmin; ?></td>
                    <td width='150px' class="text-center">
                        <form action="/pemasok/delete/<?= $ps->id; ?>" method="get" enctype="multipart/form-data" class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger d-inline " onclick="return confirm('apakah anda yakin?');"><i class="fas fa-fw fa-trash"></i> </button> </form>
                        <a href="" class="btn btn-success" data-toggle="modal" data-target="#edit<?= $ps->id; ?>"><i class=" fas fa-fw fa-pen"></i>
                        </a>
                    </td>
                </tr>
                @endforeach()
            </tbody>
            <tfoot>
                <tr>
                    <th>Kode</th>
                    <th>Name</th>
                    <th>Alamat</th>
                    <th>NoTelpon</th>
                    <th>Pimpinan</th>
                    <th>Admin</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
        @foreach ($pemasok as $ps)
        <div class="modal fade" id="edit<?= $ps->id; ?>">
            <div class="modal-dialog modal-sm-10">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Pemasok</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/pemasok/save_edit/<?= $ps->id; ?>" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label>Kode</label>
                            <input type="" value="<?= $ps->kode; ?> " class="form-control @error('kode') is-invalid @enderror " id="kode" name="kode" autofocus value="<?= old('kode'); ?>" readonly>
                            @error('kode')
                            <div class="invalid-feedback">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="modal-body">
                            <label>Nama</label>
                            <input type="text" value="<?= $ps->name; ?>" class="form-control  @error('name') is-invalid @enderror" id=" name" name="name" autofocus value="<?= old('name'); ?>">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-body">
                            <label>Alamat</label>
                            <input type="text" value="<?= $ps->alamat; ?>" class="form-control  @error('alamat') is-invalid @enderror " id="alamat" name="alamat" autofocus value="<?= old('alamat'); ?>">
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-body">
                            <label>No Telpon</label>
                            <input type="number" value="<?= $ps->telp; ?>" class="form-control  @error('telp') is-invalid @enderror " id="telp" name="telp" autofocus value="<?= old('telp'); ?>">
                            @error('telp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-body">
                            <label>Nama Pemimpin</label>
                            <input type="text" value="<?= $ps->namapimpinan; ?>" class="form-control  @error('namapimpinan') is-invalid @enderror " id="namapimpinan" name="namapimpinan" autofocus value="<?= old('namapimpinan'); ?>">
                            @error('namapimpinan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-body">
                            <label>Nama Admin</label>
                            <input type="text" value="<?= $ps->namaadmin; ?>" class="form-control  @error('namaadmin') is-invalid @enderror " id="namaadmin" name="namaadmin" autofocus value="<?= old('namaadmin'); ?>">
                            @error('namaadmin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-edit -->
        </div>
        @endforeach

        @endSection()
