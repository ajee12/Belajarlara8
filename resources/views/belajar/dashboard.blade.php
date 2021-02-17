@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel')
<div class="row">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $jml_pemasok; ?></h3>

                <p>Pemasok</p>
            </div>
            <div class="icon">
                <i class="fas fa-stream nav-icon"></i>
            </div>
            <a href="/pemasok/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $jml_satuan; ?></h3>

                <p>Satuan</p>
            </div>
            <div class="icon">
                <i class="fas fa-truck-moving nav-icon"></i>
            </div>
            <a href="/satuan/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $jml_penjualan; ?></h3>

                <p>Penjualan</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="/master/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->


    @endSection()
