@extends('layouts.main')

@section('content')
<div class="content">
<div class="container mt-5">
    <h2 class="mb-4">Hasil Perangkingan MABAC</h2>
    <!-- Ranking -->
    <h4>Ranking</h4>
    <table class="table table-bordered table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th>Rank</th>
                <th>Kode Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Total Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasils as $data)
                <tr>
                    <td>{{ $data['rank'] }}</td>
                    <td>{{ $data['alternatif']['kd_alternatif']}}</td>
                    <td>{{ $data['alternatif']['nm_alternatif']}}</td>
                    <td>{{$data['hasil_akhir']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
