@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Categories</li>
                </ol>
            </nav>
             @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
            <table class="table table-dark table-striped">
  <thead>
    
    <tr>
      <th scope="col">#</th>
      <th scope="col">Code</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @if(count($categories)>0)
    @foreach($categories as $key=>$category)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$category->code}}</td>
      <td>{{$category->name}}</td>
      <td>{{$category->status}}</td>
      <td><a href="{{route('categories.edit',[$category->id])}}"><i class="fas fa-edit"></i></a></td>
      <td><i class="fas fa-trash"></i></td>
    </tr>
    @endforeach
    @else
    <td>No categories to display</td>
    @endif
  </tbody>
</table>
        </div>
    </div>
</div>
@endsection
