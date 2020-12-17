<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function tambah_data_mitra(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'nomer_hp' => 'required',
            'tanggal_lahir' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $mitra = new User();
        $mitra ->name = $request->input('name');
        $mitra ->email = $request->input('email');
        $mitra ->password = bcrypt($request->input('password'));
        $mitra ->nomer_hp = $request->input('nomer_hp');
        $mitra ->tanggal_lahir = $request->input('tanggal_lahir');
        $mitra ->save();
        $mitra ->assignRole('mitra'); 

        return back();
    }
}
