@extends('layouts.main')
@section('content')
    <div class="content">
            <div class="container-fluid">
                <form class="m-5 p-5" action="" method="POST">
        @csrf
        @method('PUT')
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label">Username :</label>
                    <input readonly type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Masukan Username">
                    @error('name')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label">Email :</label>
                    <input readonly type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="Masukan Username">
                    @error('email')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label">Role :</label>
                    <input readonly type="text" name="role" class="form-control" value="{{ $user->role }}" placeholder="Masukan Username">
                    @error('role')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </form>
            </div>
        </div>
@endsection      