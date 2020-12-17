@extends('layout.master')
@section('content')

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Keranjang</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/shop')}}">Lanjutkan Belanja</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                    
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach (\Cart::getContent()->toArray() as $item)
                            {{-- @dd($item['id']) --}}
                            <tr>
                                <td class="name-pr">
                                    <a href="#">
                                        {{$item['name']}}
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p>Rp {{number_format($item['price'])}}</p>
                                </td>
                                <td class="quantity-box">{{$item['quantity']}}</td>
                                <td class="total-pr">
                                    @php
                                        $total = intVal($item['price']) * intVal($item['quantity'])
                                    @endphp
                                    <p>Rp {{number_format($total)}}</p>
                                </td>
                                <td class="remove-pr">
                                <a href="{{url('remove-from-cart', $item['id'])}}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        

        
        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Order summary</h3>
                    <div class="d-flex">
                        <h4>Sub Total</h4>
                        <div class="ml-auto font-weight-bold"></div>
                        <div class="ml-auto font-weight-bold">Rp {{number_format(Cart::getSubTotal())}} </div>
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
                        <div class="ml-auto font-weight-bold">Rp  {{number_format($grandTotal)}}</div>
                        
                    </div>
                    <hr> </div>
                </div>
            <div class="col-12 d-flex shopping-box"><a href="{{url('/checkout')}}" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>
            
        </div>
    </div>
    <!-- End Cart -->
    @endsection