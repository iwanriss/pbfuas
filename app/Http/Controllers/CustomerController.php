<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function ganti_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:5|max:20',
            'password_baru' => 'required|min:5|max:20',
            'password_konfirmasi' => 'required|min:5|max:20|same:password_baru'
        ]);

        $user = User::findOrFail(Auth::user()->id);
        if (Hash::check($request->input('password'), $user->password, []) == true) {
            $user->password = bcrypt($request->input('password_baru'));
            $user->save();
            return back()->with('success', 'Password berhasil diganti');
        }else {
            return back()->with('alert', 'Password Tidak Cocok');
        }
    }

    public function index()
    {
        $data = User::findOrFail(Auth::user()->id);
        // dd($data);
        return view('customer', compact('data'));
    }

    public function getDataCustomerAccount($id)
    
    {
        $customer = User::findOrFail($id);
        return json_encode($customer);
    }
    
    public function updateCustomerAccount(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'nomer_hp' => 'required',
            'tanggal_lahir' => 'required',

        ]);
        $customer = User::findOrFail($id);
        // dd($customer);
        User::where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'nomer_hp' => $request->input('nomer_hp'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
        ]);
        return redirect()->action('CustomerController@updateCustomerAccount')->with('berhasil', 'data berhasil diubah');;
    }
    
}
