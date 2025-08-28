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
      <th scope="col">SN</th>
      <th scope="col">Brand</th>
      <th scope="col">Category</th>
      <th scope="col">Code</th>
      <th scope="col">Name</th>
      <th scope="col">Attachment</th>
      <th scope="col">Status</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @if(count($items)>0)
    @foreach($items as $key=>$item)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$item->brand_id}}</td>
      <td>{{$item->category_id}}</td>
      <td>{{$item->code}}</td>
      <td>{{$item->name}}</td>
      <td>
    @if($item->attachment)
        <img src="{{ asset('storage/' . $item->attachment) }}"  width="80" height="80" style="object-fit: cover;">
    @else
        N/A
    @endif
</td>
      <td>{{$item->status}}</td>
      <td><a href="{{ route('items.edit', $item->id) }}"><i class="fas fa-edit"></i></a></td>
      <td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
    <i class="fas fa-trash"></i>
</a></td>
    </tr>
    <!--modal code-->
    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel{{ $item->id }}">Delete Brand</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete the item <strong>{{ $item->name }}</strong>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!--end modal code-->
   @endforeach
   @else
   <td>No item to display</td>
   @endif
  </tbody>
</table>
        </div>
    </div>
</div>
@endsection
