<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Order;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index()
    {
        return view('cart');
    }
    public function AddToCart($id)
    {
        // dd($id);
        $products = Product::findOrFail($id);
        \Cart::add($products->id, $products->product_name, $products->price, 1, array());

        return redirect()->route('cart');
    }
    public function RemoveCart($id)
    {
        // dd($id);
        $products = Product::findOrFail($id);
        \Cart::remove($products->id);

        return redirect()->route('cart');
    }
    public function detail($id)
    {
        $products = Product::findOrFail($id);
        // dd($products);
        return view('detail', compact('products'));
    }
    public function checkout()
    {
        $provinces = DB::table('provinces')->get();

        return view('checkout', compact('provinces'));
    }
    public function pembayaran()
    {
        return view('/pembayaran');
    }
    public function tambah_data_order(Request $request)
    {
        $this->validate($request, [
            'alamat' => 'required',
        ]);

        // dd($request->all());
        $orders = new Order();
        $orders ->user_id = Auth::user()->id;
        $orders ->nama_depan = $request->input('nama_depan');
        $orders ->nama_belakang = $request->input('nama_belakang');
        $orders ->product_id = $request->input('product_id');
        $orders ->subtotal = $request->input('subtotal');
        $orders ->nama_barang = $request->input('nama_barang');
        $orders ->Qty = $request->input('Qty');
        $orders ->kecamatan = $request->input('kecamatan');
        $orders ->alamat = $request->input('alamat');

        $orders->save();
        
        return redirect()->route('pembayaran');
    }
    public function tambah_data_bukti(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'avatar_bukti' => 'required',
        ]);

        
        if ($request->file('avatar_bukti')) {
            $image_path = $request->file('avatar_bukti')->store('avatar_product', 'public');
        }
        
        $orders = Order::where('user_id', Auth::user()->id)->update([
            'avatar_bukti' => $image_path
        ]);
        
        return redirect()->route('Notifikasi');

    }
    public function proses($id)
    {
        $orders = Order::findOrFail($id);
        $orders->status = 'proses';
        $orders->save();
        return redirect('/pembelian')->with('status', 'data pemesanan siap di proses');
    }
    public function selesai($id)
    {
        $orders = Order::findOrFail($id);
        $orders->status = 'selesai';
        $orders->save();

        $products = Product::findOrFail($orders->product_id);
        $products->stock = $products->stock -1;
        $products->save();
        // dd($products);
        return redirect('/pembelian')->with('status', 'data pemesanan telah selesai');
    }
    public function tolak($id)
    {
        $orders = Order::findOrFail($id);
        $orders->status = 'ditolak';
        $orders->save();
        return redirect('/pembelian')->with('status', 'data pemesanan ini ditolak');
    }
    
    public function batal($id)
    {
        $orders = Order::findOrFail($id);
        $orders->status = 'batal';
        $orders->save();
        return redirect('/Notifikasi', compact('orders'))->with('status', 'pemesanan anda dibatalkan');
    }
    public function pembelian()
    {
        $orders = Order::all();
        
        
        return view('pembelian', compact('orders'));
    }
    public function Notifikasi()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        
        
        return view('Notifikasi', compact('orders'));
        
    }

}
