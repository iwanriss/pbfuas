<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('index');
    })->name('/');
    Route::get('/indexAdmin', 'IndexAdminController@index')->name('indexAdmin');
    Route::get('/dataMitra', 'dataMitraController@index')->name('dataMitra');
    Route::get('/dataCustomer', 'dataCustomerController@index')->name('dataCustomer');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/testimoni', 'AboutController@index')->name('testimoni');
    Route::get('/dataTestimoni', 'AboutController@dataTestimoni')->name('dataTestimoni');
    Route::get('/story', 'AboutController@story')->name('story');
    Route::get('/shop', 'ShopController@index')->name('shop');
    Route::get('/edukasi', 'EdukasiController@index')->name('edukasi');
    Route::get('/index', 'IndexController@index')->name('index');
    Route::get('/customer', 'CustomerController@index')->name('customer');
    Route::get('/indexMitra', 'IndexMitraController@index')->name('indexMitra');
    Route::get('/cart', 'OrderController@index')->name('cart');
    Route::get('/checkout', 'OrderController@checkout')->name('checkout');
    Route::get('/pembelian', 'OrderController@pembelian')->name('pembelian');
    Route::get('/pembayaran', 'OrderController@pembayaran')->name('pembayaran');
    Route::get('/Notifikasi', 'OrderController@Notifikasi')->name('Notifikasi');
    Route::get('/detail/{id}', 'OrderController@detail');
    Route::get('/TambahProduk', 'ProductController@index')->name('TambahProduk');
    Route::get('/DataCustomerMitra', 'DataCustomerMitraController@index')->name('DataCustomerMitra');
    Route::get('/dataEdukasi', 'DataCustomerMitraController@dataEdukasi')->name('dataEdukasi');
    Route::post('/ganti-password', 'CustomerController@ganti_password');
    Route::post('/tambah-data-mitra', 'UserController@tambah_data_mitra');
    Route::get('get-data-mitra/{id}', 'dataMitraController@getDataMitra');
    Route::post('update-mitra/{id}', 'dataMitraController@updateMitra');
    Route::get('get-data-mitra/{id}', 'indexMitraController@getDataMitra');
    Route::post('update-customer-account/{id}', 'CustomerController@updateCustomerAccount');
    Route::get('get-data-customer-account/{id}', 'CustomerController@getDataCustomerAccount');
    Route::post('hapus-mitra/{id}', 'dataMitraController@hapusMitra');
    Route::get('get-data-customer/{id}', 'dataCustomerController@getDataCustomer');
    Route::post('update-customer/{id}', 'dataCustomerController@updateCustomer');
    Route::post('hapus-customer/{id}', 'dataCustomerController@hapusCustomer');
    Route::post('/tambah-data-produk', 'ProductController@tambah_data_produk');
    Route::get('get-data-produk/{id}', 'ProductController@getDataProduk');
    Route::post('update-produk/{id}', 'ProductController@updateProduk');
    Route::post('add-to-cart/{id}', 'OrderController@AddToCart');
    Route::get('remove-from-cart/{id}', 'OrderController@RemoveCart');
    Route::post('/tambah-data-order', 'OrderController@tambah_data_order');
    Route::post('/tambah-data-bukti', 'OrderController@tambah_data_bukti');
    Route::get('get-data-order/{id}', 'OrderController@getDataOrder');
    Route::get('/proses{id}', 'OrderController@proses');
    Route::get('/selesai{id}', 'OrderController@selesai');
    Route::get('/tolak{id}', 'OrderController@tolak');
    Route::post('hapus-pemesanan/{id}','OrderController@hapus_pemesanan');
    Route::get('/batal{id}', 'OrderController@batal');
    Route::post('post-artikel', 'AboutController@store');
    Route::get('selengkapnya/{id}', 'AboutController@Selengkapnya');
    Route::post('/tambah-data-edukasi', 'DataCustomerMitraController@tambah_data_edukasi');
    Route::get('get-data-videos/{id}', 'DataCustomerMitraController@getDataVideos');
    Route::post('update-videos/{id}', 'DataCustomerMitraController@updateVideo');
    Route::post('hapus-video/{id}','DataCustomerMitraController@hapusVideo');
});

Route::get('/forgot_password', 'Security\ForgotPassword@forgot');
Route::post('/forgot_password', 'Security\ForgotPassword@password');


