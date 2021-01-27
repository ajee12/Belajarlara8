@extends('layout.navbar')
@section('content')
@section('judul', 'LARAVEL | Tambah Persediaan')
@if (session('sukses'))
<div class="alert alert-success mt-2" role="alert">
    {{session('sukses') }}.
    @endif
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="my-3">Tambah Persediann</h2>
                <hr>

                <form action="/persediaan/save_persediaan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="kode" class="col-2 col-form-label">Kode</label>
                        <div class="col-sm-4">
                            <input type="kode" class="form-control @error('kode') is-invalid @enderror " id="kode" name="kode" autofocus value="<?= old('kode'); ?>">
                            @error('kode')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="name" class=" col-2  col-form-label">Nama</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id=" name" name="name" autofocus value="<?= old('name'); ?>">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_satuan" class="col-2 col-form-label">Nama Satuan</label>
                        <div class="col-sm-4">
                            <select type="id_satuan" class="form-control  @error('id_satuan') is-invalid @enderror" id="id_satuan" name="id_satuan">
                                <option value="">--Pilih Satuan--</option>
                                @foreach ($satuan as $s)
                                <option value="<?= $s->id; ?>"><?= $s->name_satuan; ?></option>
                                @endforeach
                                @error('id_satuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        </select>
                    </div>
            </div>
            <div class="form-group row">
                <label for="hrgjual" class="col-2 col-form-label">Harga Jual</label>
                <div class="col-sm-4">
                    <input type="hrgjual" class="form-control  @error('hrgjual') is-invalid @enderror " id="hrgjual" name="hrgjual" autofocus value="<?= old('hrgjual'); ?>">
                    @error('hrgjual')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="hrgbeliratarata" class=" col-2 col-form-label">Harga Beli</label>
                <div class="col-sm-4">
                    <input type="hrgbeliratarata" class="form-control  @error('hrgbeliratarata') is-invalid @enderror " id="hrgbeliratarata" name="hrgbeliratarata" autofocus value="<?= old('hrgbeliratarata'); ?>">
                    @error('hrgbeliratarata')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Tambah</button>
        </div>
    </div>
</div>
</form>




@endSection()
