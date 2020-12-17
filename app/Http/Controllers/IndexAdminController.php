<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndexAdminController extends Controller
{
    public function index()
    {
        $admin = User::whereHas('roles', function($q){
            $q->where('name', 'admin');
        })->get();
        // dd($mitra);
        return view('indexAdmin', compact('admin'));
    }
}
