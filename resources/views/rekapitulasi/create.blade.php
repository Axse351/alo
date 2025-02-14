@extends('welcome')

@section('content')
    <div class="container">
        <h1>Tambah Rekapitulasi</h1>

        <form action="{{ route('rekapitulasi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jmlh_perekam">Jumlah Perekam:</label>
                <input type="number" name="jmlh_perekam" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jmlh_suket">Jumlah Suket:</label>
                <input type="number" name="jmlh_suket" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jmlh_kia">Jumlah KIA:</label>
                <input type="number" name="jmlh_kia" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jmlh_ktp">Jumlah KTP:</label>
                <input type="number" name="jmlh_ktp" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="penerbitan_akte">Penerbitan Akte:</label>
                <input type="number" name="penerbitan_akte" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('rekapitulasi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
