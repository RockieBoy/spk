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
            
            <a class="btn btn-success mb-4" href="{{ route('kriterium.create') }}">+ Tambah Data Kriteria</a>

            <div class="table-responsive">
                  <table class="table table-center card-table table-striped" style="text-align: center;">
                        <thead>
                              <tr>
                                    <th>Nomor</th>
                                    <th>Kode Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                              </tr>
                        </thead>
                        <tbody>
                        <tr>
                              @foreach ($kriterium as $data)
                              <td>{{$loop->iteration}}</td>
                              <td>{{$data->kd_kriteria}}</td>
                              <td>{{$data->nm_kriteria}}</td>
                              <td>{{$data->bobot}}</td>
                              <td>{{$data->jenis}}</td>
                              <td>
                                    <form action="{{route('kriterium.destroy', $data->id)}}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <a href="{{route('kriterium.edit', $data->id)}}" class="btn btn-primary">Edit</a>
                                          <button type="submit" class="btn btn-danger">Hapus</button>
                                          <a href="{{route('kriterium.subkriterias.index', $data->id)}}" class="btn btn-warning">Sub Kriteria</a>
                                          
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