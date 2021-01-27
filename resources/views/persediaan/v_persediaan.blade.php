@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Persediaan')
@section('title', ' Data Master Persediaan')
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
        <a href="/persediaan/tambah_persediaan" class="btn btn-primary">Tambah Persediaan</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>Kode</th>
                    <th>Name</th>
                    <th>Nama Satuan</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($persediaan as $pr)
                <tr>
                    <td width='50px' class="text-center"><?= $pr->kode; ?></td>
                    <td><?= $pr->name; ?>
                    </td>
                    <td><?= $pr->name_satuan; ?></td>
                    <td> <?= $pr->hrgjual; ?></td>
                    <td><?= $pr->hrgbeliratarata; ?></td>
                    <td width='150px' class="text-center">
                        <form action="" method="get" enctype="multipart/form-data" class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger d-inline " onclick="return confirm('apakah anda yakin?');"><i class="fas fa-fw fa-trash"></i> </button> </form>
                        <a href="" class="btn btn-success" data-toggle="modal" data-target=""><i class="fas fa-fw fa-pen"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="text-center">
                <tr>
                    <th>Kode</th>
                    <th>Name</th>
                    <th>Nama Satuan</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
        @endSection()
