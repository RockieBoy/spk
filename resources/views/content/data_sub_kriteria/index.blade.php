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
            <a class="btn btn-success mb-4" href="{{ route('kriterium.index') }}"> <- Kembali </a>
            
            <div class="row mb-5">
                  <form class="d-flex w-100 " action="" method="GET">
                  @csrf
                        <input type="text" class="form-control mr-5" name="" placeholder="Silahkan cari data yang diperlukan disini" aria-label="Cari">
                        <input type="submit" value="Cari Data" id="" class="btn btn-outline-success">
                  </form>
            </div>
            
            <center>
            <h2>Sub Kriteria untuk Kriteria {{ $kriterium->kd_kriteria }} : {{ $kriterium->nm_kriteria }}</h2>
            </center>

            </div>

            <a class="btn btn-success mb-4" href="{{ route('kriterium.subkriterias.create', $kriterium) }}">+ Tambah Data Sub Kriteria</a>

            <div class="table-responsive">
                  <table class="table table-center card-table table-striped" style="text-align: center;">
                        <thead>
                              <tr>
                              <th>No</th>
                              <th>Nama Sub Kriteria</th>
                              <th>Nilai</th>
                              <th>Aksi</th>
                              </tr>
                        </thead>
                        <tbody>
                        <tr>
                              @foreach ($subkriteria as $sub)
                              <td>{{$loop->iteration}}</td>
                              <td>{{ $sub->nm_subkriteria }}</td>
                              <td>{{ $sub->nilai }}</td>
                              <td>
                                    <form action="{{route('kriterium.subkriterias.destroy', [$kriterium, $sub])}}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <a href="{{route('kriterium.subkriterias.edit', [$kriterium, $sub])}}" class="btn btn-primary">Edit</a>
                                          <button type="submit" class="btn btn-danger">Hapus</button>
                                          
                                    </form>
                              </td> 
                        </tr>
                              @endforeach  
                        </tbody>
                  </table>
            </div>
      </div>
</div>
@endsection      