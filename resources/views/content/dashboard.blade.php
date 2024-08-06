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
      <!-- End Navbar -->
<php
@extends('layouts.main')
@section('content')
      <div class="content">
      
      <div class="container my-5 p-2">
        <center>
          <h1>
            Selamat datang, {{ Auth::user()->name }}👋
          </h1>
          <h1>
            Di Halaman {{ Auth::user()->role }}
          </h1>
          <hr>
          <h2>
            Sistem Penunjang Keputusan Metode MABAC
          </h2>
          <h2>
            Perankingan Mahasiswa terbaik Teknik Informatika Universitas Catur Insan Cendekia
          </h2>
        </center>
      </div> 
        
        </div>
@endsection      