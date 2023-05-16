<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url(auth()->user()->foto ?? '') }}" class="img-circle img-profil" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            @if (auth()->user()->level == 1)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-database"></i>
                        <span>Data Master</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('kategori.index') }}"><i class="fa fa-tags"></i>
                                Kategori </a></li>
                        <li><a href="{{ route('produk.index') }}"><i class="fa fa-industry"></i>
                                Produk</a></li>
                        <li><a href="{{ route('mentahan.index') }}"><i class="fa fa-hourglass-o"></i>
                                Barang Mentah</a></li>
                        <li><a href="{{ route('setengahJadi.index') }}"><i class="fa fa-hourglass-3"></i>
                                Barang Setengah Jadi </a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-refresh"></i>
                        <span>Transaksi</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('pengeluaran.index') }}"><i class="fa fa-opencart"></i>
                                Pengeluaran </a></li>
                        <li><a href="{{ route('pembelian.index') }}"><i class="fa fa-shopping-cart"></i>
                                Pembelian </a></li>
                        <li><a href="{{ route('penjualan.index') }}"><i class="fa fa-money"></i>
                                Penjualan </a></li>
                        <li><a href="{{ route('transaksi.baru') }}"><i class="fa fa-plus"></i>
                                Transaksi</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-print"></i>
                        <span>Laporan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('laporan.index') }}"><i class="fa fa-file-archive-o"></i>
                                Laporan Inventory</a>
                        </li>
                        <li><a href="#"><i class="fa fa-file-pdf-o"></i>
                                Laporan Pengeluaran</a>
                        </li>
                        <li><a href="#"><i class="fa fa-file-excel-o"></i>
                                Laporan Transaksi</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-code"></i>
                        <span>Sistem</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.index') }}"><i class="fa fa-users"></i>Manage User</a>
                        </li>
                        <li><a href="{{ route('setting.index') }}"><i class="fa fa-gears"></i>Pengaturan</a>
                        </li>
                    </ul>
                </li>
            @elseif (auth()->user()->level == 2)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-print"></i>
                        <span>Laporan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('laporan.index') }}"><i class="fa fa-file-archive-o"></i>
                                Laporan Inventory</a>
                        </li>
                        <li><a href="#"><i class="fa fa-file-pdf-o"></i>
                                Laporan Pengeluaran</a>
                        </li>
                        <li><a href="#"><i class="fa fa-file-excel-o"></i>
                                Laporan Transaksi</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-code"></i>
                        <span>Sistem</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.index') }}"><i class="fa fa-users"></i>Manage User</a>
                        </li>
                        <li><a href="{{ route('setting.index') }}"><i class="fa fa-gears"></i>Pengaturan</a>
                        </li>
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{ route('transaksi.baru') }}">
                        <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Baru</span>
                    </a>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
