<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        
        return view('TambahProduk', compact('products'));
    }
    public function tambah_data_produk(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'avatar' => 'required',
        ]);

        // dd($request->all());
        $products = new Product();
        $products ->product_name = $request->input('product_name');
        $products ->description = $request->input('description');
        $products ->price = $request->input('price');
        $products ->stock = $request->input('stock');

        if ($request->file('avatar')) {
            $image_path = $request->file('avatar')->store('avatar_product', 'public');
            $products->avatar = $image_path;
        }

        $products ->save();
        
        
        return back();
    }
    public function getDataProduk($id)
    {
        $products = Product::findOrFail($id);
        return json_encode($products);
    }
    public function updateProduk(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'nomer_hp' => 'required',
        //     'tanggal_lahir' => 'required',

        // ]);
        $products = Product::findOrFail($id);
        $products->product_name = $request->input('product_name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->stock = $request->input('stock');
        $products->updated_by = Auth::user()->id;

            if ($request->file('avatar')) {
                if ($products->avatar && file_exists(storage_path('app/public/' . $products->avatar))) {
                    Storage::delete('public/' . $products->avatar);
                }
                $image_path = $request->file('avatar')->store('avatar_product', 'public');
                $products->avatar = $image_path;
            }

        $products->save();

        // dd($products);
        // Product::where('id', $id)
        //     ->update([
        //         'product_name' => $request->input('product_name'),
        //         'description' => $request->input('description'),
        //         'price' => $request->input('price'),
        //         'stock' => $request->input('stock'),
        //         'stock' => $request->input('stock'),
        //         'updated_by' => Auth::user()->id,

                
        //     ]);

        return redirect()->action('ProductController@index')->with('berhasil', 'data penjualan berhasil diubah');;
    }

}
