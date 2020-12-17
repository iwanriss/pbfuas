<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class dataMitraController extends Controller
{
    public function index()
    {
        $mitra = User::whereHas('roles', function($q){
            $q->where('name', 'mitra');
        })->get();
        // dd($mitra);
        return view('dataMitra', compact('mitra'));
    }

    public function getDataMitra($id)
    {
        $mitra = User::findOrFail($id);
        return json_encode($mitra);
    }

    public function updateMitra(Request $request, $id)
    {
        $mitra = User::findOrFail($id);
        // dd($mitra->email);
        if ($request->input('email') !== $mitra->email){
            $this->validate($request, [
                'name' => 'required|min:5',
                'email' => 'required|email|unique:users',
                'nomer_hp' => 'required',
                'tanggal_lahir' => 'required',
    
            ]);            
        }else{
            $this->validate($request, [
                'name' => 'required|min:5',
                'email' => 'required|email',
                'nomer_hp' => 'required',
                'tanggal_lahir' => 'required',
    
            ]);
        }
        // $this->validate($request, [
        //     'name' => 'required|min:5',
        //     'email' => 'required|email|unique:users',
        //     'nomer_hp' => 'required',
        //     'tanggal_lahir' => 'required',

        // ]);
        $mitra = User::findOrFail($id);
        // dd($mitra);
        User::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'nomer_hp' => $request->input('nomer_hp'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
            ]);
        return redirect()->action('dataMitraController@index')->with('berhasil', 'data berhasil diubah');;
    }
    public function hapusMitra(Request $request, $id)
    {
        $mitra = User::findOrFail($id);
        // dd($mitra);
        $mitra->delete();
        return redirect()->action('dataMitraController@index')->with('berhasil', 'data berhasil dihapus');;
        
    }
}
