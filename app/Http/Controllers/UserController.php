<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   
    function index(){
        return view('auth.login');
    }

    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'

        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi',
        ]);

        $infologin =[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('/dashboard');
        } else{
            return redirect('')->withErrors('Username dan Password Yang dimasukkan Salah')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }

    public function account()
    {
        $user = Auth::user();
        return view('auth.account', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Nama Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        // Update user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('user.account')->with('success', 'Akun berhasil diubah');
    }
}
