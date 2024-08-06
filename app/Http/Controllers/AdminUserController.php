<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class AdminUserController extends Controller
{
    public function index()
    {

        $adminusers = User::orderBy('id','asc')->get();
        return view('content.data_user.index',compact('adminusers'));
    }


    public function create()
    {
        return view('content.data_user.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'role'=> 'required',
            'password'=> 'required',
            'email'=> 'required',
        ]);

        User::create([
            'name'=> $request->name,
            'role'=> $request->role,
            'password'=> bcrypt($request->password),
            'email'=> $request->email,
        ]);
        return redirect()->route('adminusers.index') ->with('success','Data User Berhasil Dibuat.');
    }


    public function edit(User $adminusers)
    {
        return view('content.data_user.edit',compact('adminusers'));
    }

    public function update(Request $request, User $adminusers)
{
    
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'role' => 'required',
        'password' => 'nullable'
    ], [
        'name.required' => 'Nama Wajib Diisi',
        'email.required' => 'Email Wajib Diisi',
        'role.required' => 'Role Wajib Diisi',
    ]);

    
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
    ];

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    $adminusers->update($data);

    return redirect()->route('adminusers.index')->with('success', 'Akun berhasil diubah');
}


    public function destroy(User $adminusers)
    {
        
        $adminusers->delete();

        return redirect()->route('adminusers.index')->with('success','Kriteria berhasil dihapus ');
    }

}
