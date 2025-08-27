@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Brands</li>
                </ol>
            </nav>
            <table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Code</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @if(count($brands)>0)
    @foreach($brands as $key=>$brand)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$brand->code}}</td>
      <td>{{$brand->name}}</td>
      <td>{{$brand->status}}</td>
    </tr>
    @endforeach
    @else
    <td>No departments to display</td>
    @endif
  </tbody>
</table>
        </div>
    </div>
</div>
@endsection
