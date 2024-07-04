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
                  <form class="m-5 p-5" action="{{route('kriterium.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf

                        <div class="mb-3">
                        <label class="form-label">Kode Kriteria :</label>
                              <input type="text" name="kd_kriteria" class="form-control " placeholder="Masukan Kode Kriteria">
                        </div>      

                        <div class="mb-3">
                        <label class="form-label">Nama Kriteria :</label>
                              <input type="text" name="nm_kriteria" class="form-control " placeholder="Masukan Nama Kriteria">
                        </div>

                        <div class="mb-3">
                        <label class="form-label">Bobot :</label>
                              <input type="text" name="bobot" class="form-control " placeholder="Masukan Nama Kriteria">
                        </div>

                        <div class="mb-3">
                        <label class="form-label">Jenis :</label>
                              <select name="jenis" class="form-control">
                                    <option selected>Pilih Jenis Bahan</option>
                                    <option value="Cost">Cost</option>
                                    <option value="Benefit">Benefit</option>
                              </select>
                        </div>


                        <div class="mb-3">
                        <center>
                              <input type="submit" value="Simpan" class="btn btn-success">
                              <a class="btn btn-primary" href="{{route('kriterium.index')}}">Back</a>
                        </center>
                        </div>
                  </form>
            </div>
      </div>
@endsection      