@extends('layout.master')
@section('content')

<div class="row">
    <div class="list-view-box">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <img src="{{asset('storage/'. $products->avatar)}}" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                <div class="why-text full-width">
                    <h4>{{$products->product_name}}</h4>
                    <h5>Rp. {{number_format($products->price)}}</h5>
                    <p>{{$products->description}}</p>
                    <p>stock : {{$products->stock}}</p>
                    @if($products->stock != 0)
                    <form action="{{url('add-to-cart', $products->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Add to Cart</button>
                    </form>                        
                    @endif

                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    
    @endsection