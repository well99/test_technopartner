@extends('layout.main')

@section('content')
<div class="container-fluid px-4">
    <div class=" mb-4 mt-2">
        <a href="/transaksi/add" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <h4>Data Transaksi</h4>
        </div>
        <div class="card-body">
            <br>
            <form class="row" method="GET">
                <div class="col-4">
                    <div class="form-group">
                        <label>Start</label>
                        <input type="date" name="start" id="start" class="form-control" placeholder="Start" value="{{ isset($_GET['start']) ? $_GET['start'] : date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d')))); }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>End</label>
                        <input type="date" name="end" id="end" class="form-control" placeholder="End" value="{{ isset($_GET['end']) ? $_GET['end'] : date('Y-m-d') }}">
                    </div>
                </div>
                <div class="col-4">
                    <button class="btn btn-primary" type="submit" style="margin-top:24px;">
                        <li class="fa fa-search"></li> Search
                    </button>
                </div>
            </form>
            <br><br>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Nama Kategori</th>
                        <th>Nominal</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $tr)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tr->tipe_transaksi }}</td>
                        <td>{{ $tr->kategori->nama_kategori }}</td>
                        <td>{{ $tr->nominal }}</td>
                        <td>{{ $tr->deskripsi }}</td>
                        <td>
                            <a href="/transaksi/edit/{{ $tr->id_transaksi }}" class="btn btn-warning">Edit</a>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('transaksi.hapus', $tr->id_transaksi) }}" method="get">
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