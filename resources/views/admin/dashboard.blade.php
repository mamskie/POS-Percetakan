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
                <?php
                    $transaksi = DB::table('penjualan')->sum('bayar');
                    ?>
                <h3>{{ $transaksi }}</h3>
                <p>Total Penjualan</p>
            </div>
            <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>
            <a href="{{ route('penjualan.index') }}" class="small-box-footer">Lihat <i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <?php
                    $pembelian = DB::table('pembelian')->sum('total_harga');
                    ?>
                <h3>{{ $pembelian }}</h3>
                <p>Total Belanja</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="{{ route('pembelian.index') }}" class="small-box-footer">Lihat <i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <?php
                    $pengeluaran = DB::table('pengeluaran')->sum('nominal');
                    ?>
                <h3>{{ $pengeluaran }}</h3>
                <p>Total Pengeluaran</p>
            </div>
            <div class="icon">
                <i class="fa fa-cart-plus"></i>
            </div>
            <a href="{{ route('pengeluaran.index') }}" class="small-box-footer">Lihat <i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <?php
                    $transaksi = DB::table('penjualan')->sum('bayar');
                    $pembelian = DB::table('pembelian')->sum('total_harga');
                    $pengeluaran = DB::table('pengeluaran')->sum('nominal');
                    $total = $transaksi - ($pembelian + $pengeluaran);
                    ?>
                <h3>{{ $total }}</h3>
                <p>Profit</p>
            </div>
            <div class="icon">
                <i class="fa fa-line-chart"></i>
            </div>
            <a href="{{ route('setengahJadi.index') }}" class="small-box-footer">Lihat <i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $kategori }}</h3>
                <p>Total Kategori</p>
            </div>
            <div class="icon">
                <i class="fa fa-cube"></i>
            </div>
            <a href="{{ route('kategori.index') }}" class="small-box-footer">Lihat <i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $produk }}</h3>
                <p>Total Produk</p>
            </div>
            <div class="icon">
                <i class="fa fa-table"></i>
            </div>
            <a href="{{ route('produk.index') }}" class="small-box-footer">Lihat <i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $mentahan }}</h3>
                <p>Jenis Bahan Mentah</p>
            </div>
            <div class="icon">
                <i class="fa fa-th"></i>
            </div>
            <a href="{{ route('mentahan.index') }}" class="small-box-footer">Lihat <i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $SetengahJadi }}</h3>
                <p>Jenis Bahan Setengah Jadi</p>
            </div>
            <div class="icon">
                <i class="fa fa-th-large"></i>
            </div>
            <a href="{{ route('setengahJadi.index') }}" class="small-box-footer">Lihat <i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Pendapatan {{ tanggal_indonesia($tanggal_awal, false) }} s/d
                    {{ tanggal_indonesia($tanggal_akhir, false) }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" style="height: 180px;"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row (main row) -->
@endsection

@push('scripts')
<!-- ChartJS -->
<script src="{{ asset('AdminLTE-2/bower_components/chart.js/Chart.js') }}"></script>
<script>
    $(function() {
            // Get context with jQuery - using jQuery's .get() method.
            var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
            // This will get the first returned node in the jQuery collection.
            var salesChart = new Chart(salesChartCanvas);

            var salesChartData = {
                labels: {{ json_encode($data_tanggal) }},
                datasets: [{
                    label: 'Pendapatan',
                    fillColor: 'rgba(60,141,188,0.9)',
                    strokeColor: 'rgba(60,141,188,0.8)',
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: {{ json_encode($data_pendapatan) }}
                }]
            };

            var salesChartOptions = {
                pointDot: false,
                responsive: true
            };

            salesChart.Line(salesChartData, salesChartOptions);
        });
</script>
@endpush