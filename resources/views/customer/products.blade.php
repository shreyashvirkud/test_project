@extends('layouts.customer')

@section('title','Product')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        
        @foreach($products as $product)
        <div class="col-md-3 @if($product->status == '0') disablediv @endif" >
            <div class="ibox">
                <div class="ibox-content product-box">

                    <div class="product-imitation">
                        <img src="{{ asset('storage/' .$product->image) }}" >
                    </div>
                    <div class="product-desc">
                        <span class="product-price">
                            ₹ {{ $product->amount }}
                        </span>
                        <small class="text-muted">Category</small>
                        <a href="#" class="product-name"> {{ $product->prd_name}}</a>



                        <div class="small m-t-xs">
                            {{ $product->description }}
                        </div>
                        <div class="m-t text-righ">

                            <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
          
    </div>
    {{$products->links()}}
            <span  class="float-right">Total products: {{$products->total()}}</span>
    
</div>
@endsection
