<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $pemasukan = Transaksi::where('tipe_transaksi', 'pemasukan')->sum('nominal');
        $pengeluaran = Transaksi::where('tipe_transaksi', 'pengeluaran')->sum('nominal');
        // dd($pemasukan);
        return view('home', [
            'all' => $pemasukan - $pengeluaran,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran
        ]);
    }
}
