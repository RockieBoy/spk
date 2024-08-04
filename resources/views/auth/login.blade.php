@extends('layouts.mainform')
@section('content')
<section class="h-100 gradient-form" style="background-color: #1b1f1a;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                    <h4 class="mt-1 mb-5 pb-1">Sistem Penunjang Keputusan</h4>
                </div>

                <form action="" method="POST">
                    @csrf
                    <center>
                        <p>Silahkan Login</p>
                    </center>
                    

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="form2Example11">Email</label>
                    <input type="email" value="{{old('email')}}" name="email" id="form2Example11" class="form-control" placeholder="Masukkan Email anda"/>
                    @error('email')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                        
                </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="form2Example22">Password</label>
                        <input type="password" name="password" id="form2Example22" class="form-control" placeholder="Masukkan Password anda"/>
                        @error('password')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Login</button>
                    </div>
                </form>

            </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <h4 class="mb-4">Sistem Penunjang Keputusan</h4>
                    <p class="small mb-0">Sistem Penunjang Keputusan menggunakan metode MABAC untuk menentukan perankingan mahasiswa terbaik Teknik Informatika Unersitas Catur Insan Cendekia</p>
                </div>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection