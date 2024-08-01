@extends('layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">
        <h2>Edit Penilaian</h2>
        <form action="{{ route('alternatif.penilaians.update', $alternatif) }}" method="POST">
            @csrf
            @method('PUT')

            @foreach($kriteria as $k)
                <div class="form-group">
                    <label for="kriteria-{{ $k->id }}">{{ $k->kd_kriteria }}: {{ $k->nm_kriteria }}</label>
                    <select class="form-control" name="kriteria[{{ $k->id }}]" required>
                        <option value="">~Pilih Sub Kriteria~</option>
                        @foreach($k->subkriteria as $sk)
                            <option value="{{ $sk->id }}" {{ isset($penilaian[$k->id]) && $penilaian[$k->id] == $sk->id ? 'selected' : '' }}>{{ $sk->nm_subkriteria }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach

            <div class="mb-3">
                <center>
                    <input type="submit" value="Update" class="btn btn-success">
                    <a class="btn btn-primary" href="{{ route('alternatif.penilaians.index', $alternatif) }}">Back</a>
                </center>
            </div>
        </form>
    </div>
</div>
@endsection
