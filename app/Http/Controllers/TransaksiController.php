<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Kategori;

class TransaksiController extends Controller
{
    function index(Request $request)
    {
        $trans = new Transaksi();
        $transaksi_get = Transaksi::with('kategori');
        if ($request->start && $request->end) {
            $transaksi_get->whereDate('created_at', '>=', $request->start);
            $transaksi_get->whereDate('created_at', '<=', $request->end);
            $data['transaksi'] = $transaksi_get->get();
        } else {
            $data['transaksi'] = $transaksi_get->whereMonth('created_at', dfate('m'));
        }

        // dd($data['transaksi']->toArray());
        return view('transaksi.index', $data);
    }

    function add()
    {
        $kat = new Kategori();
        $data['kategori'] = $kat->all();
        return view('transaksi.form', $data);
    }

    function store(Request $request)
    {
        Transaksi::create([
            'tipe_transaksi' => $request->tipe,
            'id_kategori' => $request->kategori,
            'nominal' => $request->nominal,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect()->to('transaksi');
    }

    function edit($id)
    {
        $kat = new Kategori();
        $data['kategori'] = $kat->all();
        $trans = new Transaksi();
        $data['trans'] = $trans->where('id_transaksi', $id)->first();
        return view('transaksi.form', $data);
    }

    function update(Request $request)
    {
        $data = [
            'tipe_transaksi' => $request->tipe,
            'id_kategori' => $request->kategori,
            'nominal' => $request->nominal,
            'deskripsi' => $request->deskripsi
        ];
        Transaksi::where('id_transaksi', $request->id)->update($data);
        return redirect()->to('transaksi');
    }

    function hapus($id)
    {
        Transaksi::where('id_transaksi', $id)->delete();
        return redirect()->to('transaksi');
    }
}
