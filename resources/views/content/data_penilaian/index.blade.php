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
                  <div>
                  @if ($errors->any())
            <div class="alert alert-danger">
                  <strong>Whoops!</strong>There were some problems with your input.<br><br>
                  <ul>
                        @foreach($errors->all() as $error)
                              <li>{{$error}}</li>
                        @endforeach
                  </ul>
            </div>
            @endif
            <div class="container">

            <a class="btn btn-success mb-4" href="{{ route('alternatif.index') }}"> <- Kembali </a>
            
            <div class="text-center mb-5">
            
            <h2>Penilaian untuk Alternatif {{$alternatif->kd_alternatif}} : {{$alternatif->nm_alternatif}}</h2>
            
            </div>

            </div>

            @if($hasPenilaian)
                  <form action="">
                  <a class="btn btn-primary mb-4" href="">Edit Penilaian</a>
                  <button class="btn btn-danger mb-4" href="">Hapus Penilaian</button>
                  </form>

            <div class="table-responsive">
                  <table class="table table-center card-table table-striped" style="text-align: center;">
                        <thead>
                              <tr>
                              <th>No</th>
                              <th>Kriteria</th>
                              <th>Nilai</th>
                              </tr>
                        </thead>
                        <tbody>
                        <tr>
                              @foreach($penilaian as $data)
                              <td>{{$loop->iteration}}</td>
                              <td>{{$data->kriteria->kd_kriteria }}</td>
                              <td>{{$data->nilai}}</td>
                        </tr>
                              @endforeach

                        </tbody>
                        
                  </table>
            </div>
            @else
                  <center>
                  <h1>Tidak ada Data Penilaian</h1>
                  <h1>Silahkan Isi Dahulu</h1>
                  <a class="btn btn-success mb-4 " href="{{route('alternatif.penilaians.create', $alternatif)}}">+ Tambah Penilaian</a>
                  </center>
            @endif
      </div>
</div>
@endsection      