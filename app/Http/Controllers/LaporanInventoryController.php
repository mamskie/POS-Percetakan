<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Ganti "Produk" dengan model yang sesuai
use PDF;
use Illuminate\Support\Facades\View;

class LaporanInventoryController extends Controller
{
    public function index()
    {
        $produk =   Produk::all();
        return view('LaporanInventory.index', compact('produk'));
    }
    
    // public function exportPDF()
    // {
    //     $produk = Produk::all();
    
    //     $pdf = PDF::loadView('LaporanInventory.pdf', compact('produk'));
    
    //     return $pdf->download('laporan_inventory.pdf');
    // }
}