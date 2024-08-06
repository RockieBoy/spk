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
                  <form class="m-5 p-5" action="{{route('alternatif.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                        <div class="form-group">
                        <div class="mb-3">
                        <label class="form-label">NIM :</label>
                              <input type="text" name="nim" class="form-control " placeholder="Masukan NIM">
                              @error('nim')
                                    <div style="color: red;">{{ $message }}</div>
                              @enderror
                        </div> 
                        </div>      

                        <div class="form-group">
                        <div class="mb-3">
                        <label class="form-label">Nama Alternatif :</label>
                              <input type="text" name="nm_alternatif" class="form-control " placeholder="Masukan Nama Alternatif">
                              @error('nm_alternatif')
                                    <div style="color: red;">{{ $message }}</div>
                              @enderror
                        </div>
                        </div> 

                        <div class="mb-3">
                        <center>
                              <input type="submit" value="Simpan" class="btn btn-success">
                              <a class="btn btn-primary" href="{{route('alternatif.index')}}">Back</a>
                        </center>
                        </div>
                  </form>
            </div>
      </div>
@endsection      