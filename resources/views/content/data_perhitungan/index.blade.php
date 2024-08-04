@extends('layouts.main')

@section('content')
<div class="content">
<div class="container-fluid">
    <h2 class="mb-4">Hasil Perhitungan MABAC</h2>

    <!-- Matriks Keputusan -->
    <h4>Matriks Keputusan</h4>
    <table class="table table-bordered table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th>Alternatif</th>
                @foreach ($kriterias as $kriteria)
                    <th>{{ $kriteria->kd_kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs as $alternatif)
                <tr>
                    <td>{{ $alternatif->nm_alternatif }}</td>
                    @foreach ($kriterias as $kriteria)
                        <td>{{ number_format($matrixKeputusan[$alternatif->id][$kriteria->id], 3) }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Matriks Ternormalisasi -->
    <h4>Matriks Ternormalisasi</h4>
    <table class="table table-bordered table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th>Alternatif</th>
                @foreach ($kriterias as $kriteria)
                    <th>{{ $kriteria->kd_kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs as $alternatif)
                <tr>
                    <td>{{ $alternatif->nm_alternatif }}</td>
                    @foreach ($kriterias as $kriteria)
                        <td>{{ number_format($normalizedMatrix[$alternatif->id][$kriteria->id], 3) }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Matriks Ternormalisasi Terbobot -->
    <h4>Matriks Ternormalisasi Terbobot</h4>
    <table class="table table-bordered table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th>Alternatif</th>
                @foreach ($kriterias as $kriteria)
                    <th>{{ $kriteria->kd_kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs as $alternatif)
                <tr>
                    <td>{{ $alternatif->nm_alternatif }}</td>
                    @foreach ($kriterias as $kriteria)
                        <td>{{ number_format($weightedNormalizedMatrix[$alternatif->id][$kriteria->id], 3) }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Matriks Area Perkiraan Perbatasan (G) -->
    <h4>Matriks Area Perkiraan Perbatasan (G)</h4>
    <table class="table table-bordered table-striped text-center">
        <thead class="thead-dark">
            <tr>
                
                @foreach ($kriterias as $kriteria)
                    <th>{{ $kriteria->kd_kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                
                @foreach ($kriterias as $kriteria)
                    <td>{{ number_format($matrixG[$kriteria->id], 3) }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>

    <!-- Matriks Jarak Alternatif dari Daerah Perkiraan Perbatasan (Q) -->
    <h4>Matriks Jarak Alternatif dari Daerah Perkiraan Perbatasan (Q)</h4>
    <table class="table table-bordered table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th>Alternatif</th>
                @foreach ($kriterias as $kriteria)
                    <th>{{ $kriteria->kd_kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs as $alternatif)
                <tr>
                    <td>{{ $alternatif->nm_alternatif }}</td>
                    @foreach ($kriterias as $kriteria)
                        <td>{{ number_format($matrixQ[$alternatif->id][$kriteria->id], 3) }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Total Nilai Alternatif -->
    <h4>Total Nilai Alternatif (S)</h4>
    <table class="table table-bordered table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th>Alternatif</th>
                <th>Total Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs as $alternatif)
                <tr>
                    <td>{{ $alternatif->nm_alternatif }}</td>
                    <td>{{ number_format($totalNilaiAlternatif[$alternatif->id], 3) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Ranking -->
    <h4>Ranking</h4>
    <table class="table table-bordered table-striped text-center">
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
</div>
</div>
@endsection
