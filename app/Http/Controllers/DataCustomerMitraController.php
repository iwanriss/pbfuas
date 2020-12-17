<?php

namespace App\Http\Controllers;
use App\User;
use App\Video;
use Illuminate\Http\Request;

class DataCustomerMitraController extends Controller
{
    public function index()
    {
        $customer = User::whereHas('roles', function($q){
            $q->where('name', 'customer');
        })->get();
        // dd($mitra);
        return view('DataCustomerMitra' ,compact('customer'));
    }
    public function dataEdukasi()
    {
        $videos = Video::all();

        return view('dataEdukasi', compact('videos'));
    }
    public function tambah_data_edukasi(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required',
            'link' => 'required',
            ]);
            
            
            $videos = new Video();
            $videos ->judul = $request->input('judul');
            $videos ->konten = $request->input('konten');
            $videos ->link = $request->input('link');
            
            $videos ->save();
            
            
            return back();
            
    }
    public function getDataVideos($id)
    {
        $videos = Video::findOrFail($id);
        return json_encode($videos);
    }
    public function updateVideo(Request $request, $id)
    {

        $videos = Video::findOrFail($id);
        $videos->judul = $request->input('judul');
        $videos->konten = $request->input('konten');
        $videos->link = $request->input('link');



        $videos->save();


        return redirect()->action('DataCustomerMitraController@dataEdukasi')->with('berhasil', 'data edukasi berhasil diubah');;
    }
    public function hapusVideo(Request $request, $id)
    {
        $videos = Video::findOrFail($id);
        // dd($videos)
        $videos ->delete();
        return redirect()->action('DataCustomerMitraController@dataEdukasi')->with('berhasil', 'data edukasi ini telah dihapus');;
    }
}
