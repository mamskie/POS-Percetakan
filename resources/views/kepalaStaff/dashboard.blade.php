@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Dashboard</li>
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $produk }}</h3>

                    <p>Total Inventory</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cube"></i>
                </div>
                <a href="{{ route('LaporanInventory.index') }}" class="small-box-footer">Lihat <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $pengeluaran }}</h3>

                    <p>Total Pengeluaran</p>
                </div>
                <div class="icon">
                    <i class="fa fa-opencart"></i>
                </div>
                <a href="{{ route('LaporanPengeluaran.index') }}" class="small-box-footer">Lihat <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $penjualan }}</h3>

                    <p>Total Transaksi</p>
                </div>
                <div class="icon">
                    <i class="fa fa-balance-scale"></i>
                </div>
                <a href="{{ route('laporan.index') }}" class="small-box-footer">Lihat <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $user }}</h3>

                    <p>User</p>
                </div>
                <div class="icon">
                    <i class="fa fa-id-card"></i>
                </div>
                <a href="{{ route('user.index') }}" class="small-box-footer">Lihat <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row (main row) -->
@endsection
