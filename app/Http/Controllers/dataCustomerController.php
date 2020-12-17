<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class dataCustomerController extends Controller
{
    public function index()
    {
        $customer = User::whereHas('roles', function($q){
            $q->where('name', 'customer');
        })->get();
        // dd($mitra);
        return view('dataCustomer', compact('customer'));
        
    }
    public function getDataCustomer($id)
    
    {
        $customer = User::findOrFail($id);
        return json_encode($customer);
    }
    public function updateCustomer(Request $request, $id)
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
        return redirect()->action('dataCustomerController@index')->with('berhasil', 'data berhasil diubah');;
    }
    public function hapusCustomer(Request $request, $id)
    {
        $customer = User::findOrFail($id);
        // dd($customer);
        $customer ->delete();
        return redirect()->action('dataCustomerController@index')->with('berhasil', 'data berhasil dihapus');;
    }
}
