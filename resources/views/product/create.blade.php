
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.product_list') }}"> Back</a>
        </div>
    </div>
</div>



<form method="post" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" >
    @csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Name:</strong>
            <input type="text" class="form-control" name="prd_name" placeholder="Enter Product Name" value="{{ old('prd_name') }}">
            @error('prd_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Price:</strong>
            <input type="number" class="form-control" name="amount" placeholder="Enter Product Price" value="{{ old('amount') }}">
            @error('amount')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Discount Percentage:</strong>
            <input type="text" class="form-control" name="dis_amount" placeholder="Enter Product Price" value="{{ old('dis_amount') }}">
            @error('dis_amount')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description :</strong>
            <textarea type="text" class=" form-control" placeholder="Description" name="description" maxlength="150">@if(old('description')) {{ old('description') }} @endif</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
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
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Status :</strong>
            <div class="i-checks">
                <label> <input id="enabled" class="check_val" type="radio" value="Enabled" name="status" > Enabled </label>
                <input id="disabled" class="check_val" type="radio" value="Disabled" name="status"> Disabled </label>
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
</form>
@endsection
