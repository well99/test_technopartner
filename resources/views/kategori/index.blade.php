@extends('layout.main')

@section('content')
<div class="container-fluid px-4">
    <div class=" mb-4 mt-2">
        <a href="/kategori/create" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <h4>Data Kategori</h4>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $ktg)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ktg->tipe_kategori }}</td>
                        <td>{{ $ktg->nama_kategori }}</td>
                        <td>{{ $ktg->deskripsi_kategori }}</td>
                        <td>
                            <a href="/kategori/edit/{{ $ktg->id_kategori }}" class="btn btn-warning">Edit</a>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori.hapus', $ktg->id_kategori) }}" method="get">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection