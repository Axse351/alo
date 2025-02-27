@extends('welcome')

@section('content')
    <div class="container">
        <h1>Rekapitulasi</h1>
        <a href="{{ route('rekapitulasi.create') }}"class="btn btn-primary mb-3">Tambah Data</a>
        <!-- Tombol Export -->
        <a href="{{ url('rekapitulasi/export') }}" class="btn btn-success mb-3">Export Data</a>


        <!-- Form Import -->
        <form action="{{ route('rekapitulasi.import') }}" method="POST" enctype="multipart/form-data" class="mb-3">
            @csrf
            <div class="form-group">
                <label for="file">Import File (xlsx, csv):</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Import Data</button>
        </form>

        <!-- Tabel Data -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Jumlah Perekam</th>
                    <th>Jumlah Suket</th>
                    <th>Jumlah KIA</th>
                    <th>Jumlah KTP</th>
                    <th>Penerbitan Akte</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekapitulasi as $data)
                    <tr>
                        <td>{{ $data->id_rekapitulasi }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->jmlh_perekam }}</td>
                        <td>{{ $data->jmlh_suket }}</td>
                        <td>{{ $data->jmlh_kia }}</td>
                        <td>{{ $data->jmlh_ktp }}</td>
                        <td>{{ $data->penerbitan_akte }}</td>
                        <td>
                            <form action="{{ route('rekapitulasi.destroy', $data->id_rekapitulasi) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
