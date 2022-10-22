
@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Products Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('admin.products.create') }}"> Add New Product</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif



<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover dataTables-example" >
  <thead>
  <tr>
    <th>No</th>
    <th>Product Name</th>
    <th>Product Price</th>
    <th>Product Discount Price</th>
    <th>Product Description</th>
    <th>Product Image</th>
    <th>Product Status</th>
    <th width="280px">Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach ($products as $key => $product)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $product->prd_name }}</td>
    <td>{{ $product->amount }}</td>
    <td>{{ $product->dis_amount }}</td>
    <td>{{ $product->description }}</td>
    <td><img src="{{ asset('storage/' .$product->image) }}" style="height:40px; width:40px;"></td>
    <td>{{ $product->status == "1" ? "Enabled" : "Disabled" }}</td>
    <td>
      <a class="btn btn-primary" href="{{ route('admin.products.edit',$product->id) }}">Edit</a>
        <a class="btn btn-success" href="{{ route('admin.products.destroy',$product->id) }}"> Delete</a>
    </td>
  </tr>
 @endforeach
  </tbody>
  </table>
      </div>
@endsection 