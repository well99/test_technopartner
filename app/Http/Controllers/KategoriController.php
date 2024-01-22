<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Http\Requests\KategoriRequest;

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

    function store(KategoriRequest $request)
    {
        Kategori::create([
            'tipe_kategori' => $request->tipe_kategori,
            'nama_kategori' => $request->nama_kategori,
            'deskripsi_kategori' => $request->deskripsi_kategori
        ]);
        return redirect()->to('kategori');
    }

    function edit($id)
    {
        $kat = new Kategori();
        $data['kategori'] = $kat->where('id_kategori', $id)->first();
        return view('kategori.form', $data);
    }

    function update(KategoriRequest $request)
    {
        $data = [
            'tipe_kategori' => $request->tipe_kategori,
            'nama_kategori' => $request->nama_kategori,
            'deskripsi_kategori' => $request->deskripsi_kategori
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
