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
                  <form class="m-5 p-5" action="{{route('adminusers.update',$adminusers->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                        <div class="form-group">
                        <div class="mb-3">
                        <label class="form-label">Email :</label>
                              <input type="text" name="email" class="form-control" value="{{$adminusers->email}}" placeholder="Masukan Email">
                        </div>
                        </div>      

                        <div class="form-group">
                        <div class="mb-3">
                        <label class="form-label">Username :</label>
                              <input type="text" name="name" class="form-control" value="{{$adminusers->name}}" placeholder="Masukan Username">
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="mb-3">
                        <label class="form-label">Password :</label>
                              <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="mb-3">
                        <label class="form-label">Role :</label>
                              <select name="role" class="form-control">
                                    <option value="superadmin" {{ $adminusers->role == 'superadmin' ? 'selected' : '' }}>SuperAdmin</option>
                                    <option value="kaprodi" {{ $adminusers->role == 'kaprodi' ? 'selected' : '' }}>KaProdi</option>
                                    <option value="mahasiswa" {{ $adminusers->role == 'mahasiswa' ? 'selected' : '' }}>mahasiswa</option>
                              </select>
                        </div>
                        </div>

                        <div class="mb-3">
                        <center>
                              <input type="submit" value="Ubah" class="btn btn-success">
                              <a class="btn btn-primary" href="{{route('adminusers.index')}}">Back</a>
                        </center>
                        </div>
                  </form>
            </div>
      </div>
@endsection      