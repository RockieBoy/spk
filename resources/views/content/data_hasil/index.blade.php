@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Hasil Perangkingan MABAC</h2>
    <!-- Ranking -->
    <h4>Ranking</h4>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Rank</th>
                <th>Alternatif</th>
                <th>Total Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ranking as $index => $alternatifId)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $alternatifs->find($alternatifId)->nm_alternatif }}</td>
                    <td>{{ number_format($totalNilaiAlternatif[$alternatifId], 3) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
