<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
@extends('layouts.main')
@section('content')
      <div class="content">
            <div class="container-fluid">
                  <form class="m-5 p-5" action="{{route('alternatif.penilaians.store', $alternatif)}}" method="POST" enctype="multipart/form-data">
                  @csrf

                  @foreach($kriteria as $k)
                  <div class="form-group">
                        <label for="kriteria-{{ $k->id }}">{{ $k->kd_kriteria }}: {{ $k->nm_kriteria }}</label>
                              <select class="form-control" name="kriteria[{{ $k->id }}]" required>
                                    <option value="">~Pilih Sub Kriteria~</option>
                                    @foreach($k->subkriteria as $sk)
                                    <option value="{{ $sk->id }}">{{ $sk->nm_subkriteria }}</option>
                                    @endforeach
                              </select>
                  </div>
                  @endforeach

                        <div class="mb-3">
                        <center>
                              <input type="submit" value="Simpan" class="btn btn-success">
                              <a class="btn btn-primary" href="{{route('alternatif.penilaians.index', $alternatif)}}">Back</a>
                        </center>
                        </div>
                  </form>
            </div>
      </div>
@endsection      