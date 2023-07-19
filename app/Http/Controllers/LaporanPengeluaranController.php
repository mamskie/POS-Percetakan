<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran; 
use PDF;
use Illuminate\Support\Facades\View;

class LaporanPengeluaranController extends Controller
{
    public function index()
    {
        $Pengeluaran =   Pengeluaran::all();
        return view('LaporanPengeluaran.index', compact('Pengeluaran'));
    }
    
    // public function exportPDF()
    // {
    //     $produk = Produk::all();
    
    //     $pdf = PDF::loadView('LaporanInventory.pdf', compact('produk'));
    
    //     return $pdf->download('laporan_inventory.pdf');
    // }
}