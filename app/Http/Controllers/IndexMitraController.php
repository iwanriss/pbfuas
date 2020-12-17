<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IndexMitraController extends Controller
{
    public function index()
    {
        $mitra = User::whereHas('roles', function($q){
            $q->where('name', 'mitra');
        })->get();
        // dd($mitra);
        return view('indexMitra', compact('mitra'));
    }
    public function getDataMitra($id)
    {
        $mitra = User::findOrFail($id);
        return json_encode($mitra);
    }


}
