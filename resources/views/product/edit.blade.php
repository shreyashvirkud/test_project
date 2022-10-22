
@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.product_list') }}"> Back</a>
        </div>
    </div>
</div>


<form method="POST" action="{{ route('admin.products.update',$product->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" class="form-control" name="prd_name" placeholder="Enter Product Name" value="{{ $product->prd_name }}">
                @error('prd_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Price:</strong>
                <input type="number" class="form-control" name="amount" placeholder="Enter Product Price" value="{{ $product->amount }}">
                @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Discount Percentage:</strong>
                <input type="text" class="form-control" name="dis_amount" placeholder="Enter Product Price" value="{{ $product->dis_amount }}">
                @error('dis_amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description :</strong>
                <textarea type="text" class=" form-control" placeholder="Description" name="description" maxlength="150">{{ $product->description}}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Product Image :</strong>
                        <div class=" custom-file">
                            <input id="logo" type="file" class="custom-file-input" name="image" value="">
                            <label for="logo" class="custom-file-label">Choose file...</label>
                        </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
        
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <img src="{{ asset('storage/' .$product->image) }}" style="height:40px; width:40px;">

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Status :</strong>
                <div class="i-checks">
                    <label> <input id="enabled" class="check_val" type="radio" value="Enabled" name="status" {{ $product->status == '1' ? ' checked = checked' : ' ' }}> Enabled </label>
                    <input id="disabled" class="check_val" type="radio" value="Disabled" name="status" {{ $product->status == '0' ? ' checked = checked' : ' ' }}> Disabled </label>
                </div>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

@endsection 