@extends('layout.main')

@section('content')

<div class="container-fluid px-4">
    <div class="mt-4">

        @if(!empty($kategori))
        <h3>Form Edit Kategori</h3>

        <form action="{{route('editkategori')}}" method="post" class="mb-3">
            @else
            <h3>Form Tambah Kategori</h3>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{route('simpankategori')}}" method="post" class="mb-3">
                @endif
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe Kategori</label>
                    <select class="form-select" name="tipe_kategori" id="tipe">
                        <option selected value="" disabled>Pilih Tipe Kategori</option>
                        <option value="pemasukan" {{ isset($kategori->tipe_kategori) ? ($kategori->tipe_kategori == 'pemasukan') ? 'selected' : '' : '' }} {{ old('tipe_kategori') ? (old('tipe_kategori') == 'pemasukan') ? 'selected' : '' : ''}}>Pemasukan</option>
                        <option value="pengeluaran" {{ isset($kategori->tipe_kategori) ? ($kategori->tipe_kategori == 'pengeluaran') ? 'selected' : '' : '' }} {{ old('tipe_kategori') ? (old('tipe_kategori') == 'pengeluaran') ? 'selected' : '' : ''}}>Pengeluaran</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kategori</label>
                    @if(!empty($kategori))
                    <input type="text" name="nama_kategori" class="form-control" id="nama" placeholder="Nama Kategori" value="{{ $kategori->nama_kategori ?? old('nama_kategori') }}">
                    @else
                    <input type="text" name="nama_kategori" class="form-control" id="nama" placeholder="Nama Kategori" value="{{ old('nama_kategori') }}">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    @if(!empty($kategori))
                    <textarea name="deskripsi_kategori" class="form-control" id="deskripsi" rows="3">{{ $kategori->deskripsi_kategori ?? old('kategori_deskripsi') }}</textarea>
                    @else
                    <textarea name="deskripsi_kategori" class="form-control" id="deskripsi" rows="3">{{ old('kategori_deskripsi') }}</textarea>
                    @endif
                </div>
                @if(!empty($kategori))
                <input type="hidden" name="id" value="{{ $kategori->id_kategori }}">
                @endif
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
    </div>
</div>
@endsection

@section('js')
@endsection