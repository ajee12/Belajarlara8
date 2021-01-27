@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Tambah Pelanggan')

<form action="save_pelanggan" method="POST" enctype="multipart/form-data">
    @csrf

    @if (session('sukses'))
    <div class="alert alert-success mt-2" role="alert">
        {{session('sukses') }}.
        @endif

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="my-3">Daftar Pelanggan</h2>
                    <hr>

                    <div class="form-group row">
                        <label for="kode" class="col-2 col-form-label">Kode</label>
                        <div class="col-sm-4">
                            <input type="" class="form-control @error('kode') is-invalid @enderror " id="kode" name="kode" autofocus value="<?= old('kode'); ?>">
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
                        <label for="alamat" class="col-2 col-form-label">Alamat</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control  @error('alamat') is-invalid @enderror " id="alamat" name="alamat" autofocus value="<?= old('alamat'); ?>">
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="telp" class="col-2 col-form-label">No Hp</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control  @error('telp') is-invalid @enderror " id="telp" name="telp" autofocus value="<?= old('telp'); ?>">
                            @error('telp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="namapimpinan" class=" col-2 col-form-label">Nama Pimpinan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control  @error('namapimpinan') is-invalid @enderror " id="namapimpinan" name="namapimpinan" autofocus value="<?= old('namapimpinan'); ?>">
                            @error('namapimpinan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="namaadmin" class=" col-2 col-form-label">Nama Admin</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control  @error('namaadmin') is-invalid @enderror " id="namaadmin" name="namaadmin" autofocus value="<?= old('namaadmin'); ?>">
                            @error('namaadmin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Tambah</button>
                </div>
            </div>
        </div>
</form>


@endsection
