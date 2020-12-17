@extends('layout.master')
@section('content')

<div class="cart-box-main">
    <div class="container">
        <div class="row new-account-login">
            
            
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>Yuk Selesaikan Pemesananmu!</h3>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @elseif(session('berhasil'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ session('berhasil') }}</li>
                        </ul>
                    </div>
                    @endif
                    <form action = "{{url('tambah-data-order')}}/" method = "POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="mb-3">
                            <label for="firstName">Nama Depan</label>
                            <input type="text" class="form-control" id="nama_depan"
                            name="nama_depan" placeholder="" value="" required>
                            <div class="invalid-feedback"> Valid first name is required. </div>
                        </div>
                        <div class="mb-3">
                            <label for="lastName">Nama Belakang</label>
                            <input type="text" class="form-control" id="nama_belakang"  name="nama_belakang" placeholder="" value="" required>
                            <div class="invalid-feedback"> Valid last name is required. </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" value={{Auth::user()->email}} class="form-control" id="email" placeholder="">
                            <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_hp">Nomor HP</label>
                            <input type="nohp" value="{{Auth::user()->nomer_hp}}" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="">
                            <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="address" placeholder="" required>
                            <div class="invalid-feedback"> Please enter your shipping address. </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Kecamatan</label>
                                <select class="wide w-100" name="kecamatan" id="country">
                                    @foreach ($provinces as $item)
                                    
                                    <option value="{{$item->kecamatan_id}}" data-display="Select">{{$item->title}}</option>
                                    
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"> Please select a valid country. </div>
                            </div>
                            
                        </div>
                        
                        <hr class="mb-4">
                        
                        <hr class="mb-4">
                        
                        @foreach (\Cart::getContent()->toArray() as $item)
                        <div class="d-flex">
                            <h4>Product Name</h4>
                            <div class="ml-auto font-weight-bold">{{$item['name']}} </div>
                            <input type="hidden" name="nama_barang" value="{{$item['name']}}">
                        </div>
                        <div class="d-flex">
                            <h4>Product ID</h4>
                            <div class="ml-auto font-weight-bold">{{$item['id']}} </div>
                            <input type="hidden" name="product_id" value="{{$item['id']}}">
                        </div>
                        <div class="d-flex">
                            <h4>Quantity</h4>
                            <div class="ml-auto font-weight-bold">{{$item['quantity']}} </div>
                            <input type="hidden" name="Qty" value="{{$item['quantity']}}">
                        </div>
                        @endforeach
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold" name="subtotal">Rp {{number_format(Cart::getSubTotal())}} </div>
                            <input type="hidden" name="subtotal" value="{{Cart::getSubTotal()}}">
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Rp 10,000 </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            @php
                            $grandTotal = Cart::getSubTotal() + 10000;
                            @endphp
                            <div class="ml-auto font-weight-bold" id="subtotal" name="subtotal">Rp  {{number_format($grandTotal)}}</div>
                            
                        </div>
                        <hr> 
                        <button type="submit" class="btn btn-success" a href="{{url('/pembayaran')}}">Selanjutnya</button>
                    </form>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
    </div>
</div>

</div>
</div>

@endsection