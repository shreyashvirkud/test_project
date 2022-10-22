
@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Customers Management</h2>
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
    <th>Name</th>
    <th>Email</th>
    <th>Contact No</th>
    <th>Password</th>
    <th width="280px">Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach ($customers as $key => $customer)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $customer->full_name  }}</td>
    <td>{{ $customer->email }}</td>
    <td>{{ $customer->contact_no }}</td>
    <td>{{ $customer->users_password }}</td>
    <td>
      
    </td>
  </tr>
 @endforeach
  </tbody>
  </table>
      </div>
@endsection 