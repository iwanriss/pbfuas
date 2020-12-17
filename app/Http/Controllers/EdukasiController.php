<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class EdukasiController extends Controller
{
    public function index()
    {
        $videos1 = Video::where('konten', 'Part 1')->get();
        $videos2 = Video::where('konten', 'Part 2')->get();
        $videos3 = Video::where('konten', 'Part 3')->get();
        $videos4 = Video::where('konten', 'Part 4')->get();
        
        // dd($videos1);

        return view('edukasi', compact('videos1', 'videos2', 'videos3', 'videos4'));
        
    }
}
