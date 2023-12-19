<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $judul = 'Register';
        return view('register.index', [
            'judul' => $judul
        ]);
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/login')->with('success', 'User Berhasil Di Tambah');
    }

    public function getDesa()
    {
        $data = config('kecamatan.kecamatan');
        return response()->json($data);
    }
}
