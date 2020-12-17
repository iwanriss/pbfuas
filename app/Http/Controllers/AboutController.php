<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Story;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $stories = Story::all();

        return view('testimoni', compact('stories'));
    }

    public function story()
    {
        return view('story');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'author' => 'required|max:50',
            'avatar_pengalaman' => 'required',
            'konten' => 'required',
        ]);
        $stories = new Story();
        $stories ->user_id = Auth::user()->id;
        $stories ->judul = $request->input('judul');
        $stories ->author = $request->input('author');
        $stories ->konten = $request->input('konten');

        if ($request->file('avatar_pengalaman')) {
            $image_path = $request->file('avatar_pengalaman')->store('avatar_product', 'public');
            $stories->avatar_pengalaman = $image_path;
        }

        $stories ->save();
        
        
        return redirect()->route('testimoni');
    }
    public function Selengkapnya($id)
    {
        // dd($id);
        $stories = Story::where('user_id', Auth::user()->id)->get();

        return view('selengkapnya', compact('stories'));
    }
    public function dataTestimoni()
    {
        $stories = Story::where('id', Auth::user()->id)->get();

        return view('dataTestimoni', compact('stories'));
    }
}
