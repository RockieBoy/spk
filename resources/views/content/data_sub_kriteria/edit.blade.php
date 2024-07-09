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
                  <form class="m-5 p-5" action="{{route('kriterium.subkriterias.update', [$kriterium, $subkriteria])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                        <div class="mb-3">
                        <label class="form-label">Nama Sub Kriteria :</label>
                              <input type="text" name="nm_subkriteria" class="form-control" value="{{ old('nm_subkriteria', $subkriteria->nm_subkriteria) }}" placeholder="Masukan Nama Sub Kriteria">
                        </div>

                        <div class="mb-3">
                        <label class="form-label">Nilai :</label>
                              <input type="text" name="nilai" class="form-control" value="{{ old('nilai', $subkriteria->nilai) }}" placeholder="Masukan Nilai">
                        </div>

                        <div class="mb-3">
                        <center>
                              <input type="submit" value="Ubah" class="btn btn-success">
                              <a class="btn btn-primary" href="{{route('kriterium.subkriterias.index',$kriterium)}}">Back</a>
                        </center>
                        </div>
                  </form>
            </div>
      </div>
@endsection      