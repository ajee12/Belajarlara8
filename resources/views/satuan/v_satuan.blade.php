@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Satuan')
@section('title', 'Data Master Satuan')
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
        <a href="/satuan/tambah_satuan" class="btn btn-primary" data-toggle="modal" data-target="#edit">Tambah Satuan</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>


                    <th>Nama Satuan</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach($satuan as $s)
                <tr>

                    <td><?= $s->name_satuan; ?>
                    </td>

                    <td width='150px' class="text-center">
                        <form action="/satuan/delete_satuan/<?= $s->id; ?>" enctype="multipart/form-data" class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger d-inline " onclick="return confirm('apakah anda yakin?');"><i class="fas fa-fw fa-trash"></i> </button> </form>
                        <a href="" class="btn btn-success" data-toggle="modal" data-target="#edit<?= $s->id; ?>"><i class="fas fa-fw fa-pen"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <div class="modal fade" id="edit">
            <div class="modal-dialog modal-sm-10">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Satuan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/satuan/tambah_satuan" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label>Nama Satuan</label>
                            <input type="name" class="form-control" id="name_satuan" name="name_satuan" autofocus value="<?= old('name_satuan'); ?>" required>

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
        @foreach($satuan as $s)
        <div class="modal fade" id="edit<?= $s->id; ?>">
            <div class="modal-dialog modal-sm-10">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Satuan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/satuan/edit_satuan/<?= $s->id; ?>" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label>Nama Satuan</label>
                            <input type="name" value="<?= $s->name_satuan; ?>" class="form-control" id="name_satuan" name="name_satuan" autofocus value="<?= old('name_satuan'); ?>" required>

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
