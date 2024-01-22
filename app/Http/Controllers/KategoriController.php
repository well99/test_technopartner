<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    function index()
    {
        $kategori = new Kategori();
        $data['kategori'] = $kategori->all();
        return view('kategori.index', $data);
    }

    function add()
    {
        return view('kategori.form');
    }

    function store(Request $request)
    {
        Kategori::create([
            'tipe_kategori' => $request->tipe,
            'nama_kategori' => $request->nama,
            'deskripsi_kategori' => $request->deskripsi
        ]);
        return redirect()->to('kategori');
    }

    function edit($id)
    {
        $kat = new Kategori();
        $data['kategori'] = $kat->where('id_kategori', $id)->first();
        return view('kategori.form', $data);
    }

    function update(Request $request)
    {
        $data = [
            'tipe_kategori' => $request->tipe,
            'nama_kategori' => $request->nama,
            'deskripsi_kategori' => $request->deskripsi
        ];
        Kategori::where('id_kategori', $request->id)->update($data);
        return redirect()->to('kategori');
    }

    function hapus($id)
    {
        Kategori::where('id_kategori', $id)->delete();
        return redirect()->to('kategori');
    }
}
