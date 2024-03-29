@extends('layout.main')

@section('content')

<div class="container-fluid px-4">
    <div class="mt-4">

        @if(!empty($trans))
        <h3>Form Edit Transaksi</h3>
        <form action="{{route('edittransaksi')}}" method="post" class="mb-3">
            @else
            <form action="{{route('simpantransaksi')}}" method="post" class="mb-3">
                <h3>Form Tambah Transaksi</h3>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe Kategori</label>
                    <select class="form-select" name="tipe_transaksi" id="tipe">
                        <option selected value="" disabled>Pilih Tipe Kategori</option>

                        <option value="pemasukan" {{ isset($trans->tipe_transaksi) ? ($trans->tipe_transaksi == 'pemasukan') ? 'selected' : '' : '' }} {{ old('tipe_transaksi') ? (old('tipe_transaksi') == 'pemasukan') ? 'selected' : '' : '' }}>Pemasukan</option>
                        <option value="pengeluaran" {{ isset($trans->tipe_transaksi) ? ($trans->tipe_transaksi == 'pengeluaran') ? 'selected' : '' : '' }} {{ old('tipe_transaksi') ? (old('tipe_transaksi') == 'pengeluaran') ? 'selected' : '' : '' }}>Pengeluaran</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" name="id_kategori" id="kategori">
                        <option selected value="" disabled>Pilih Kategori</option>
                        @foreach($kategori as $ktg)
                        @if(!empty($trans) && $ktg->id_kategori == $trans->id_kategori)
                        <option selected value="{{ $ktg->id_kategori }}">{{ $ktg->nama_kategori }}</option>
                        @else
                        <option value="{{ $ktg->id_kategori }}" {{ old('id_kategori') ? (old('id_kategori') == $ktg->id_kategori) ? 'selected' : '' : '' }}>{{ $ktg->nama_kategori }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nominal</label>
                    @if(!empty($trans))
                    <input type="number" name="nominal" class="form-control" id="nominal" placeholder="Nominal" value="{{ $trans->nominal ?? old('nominal') }}">
                    @else
                    <input type="number" name="nominal" class="form-control" id="nominal" placeholder="Nominal" value={{ old('nominal') }}>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    @if(!empty($trans))
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3">{{ $trans->deskripsi ?? old('deskripsi') }}</textarea>
                    @else
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                    @endif
                </div>
                @if(!empty($trans))
                <input type="hidden" name="id" value="{{ $trans->id_transaksi }}">
                @endif
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
    </div>
</div>
@endsection

@section('js')
@endsection