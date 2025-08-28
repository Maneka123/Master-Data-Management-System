@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Brand -->
    <div class="form-group">
        <label for="brand_id">Brand</label>
        <select class="form-control @error('brand_id') is-invalid @enderror" id="brand_id" name="brand_id" required>
            <option value="">Select Brand</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
        @error('brand_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
    </div>

    <!-- Category -->
    <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
    </div>

    <!-- Code -->
    <div class="form-group">
        <label for="code">Item Code</label>
        <input type="text" class="form-control @error('code') is-invalid @enderror"  id="code" name="code" required>
        @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
    </div>

    <!-- Name -->
    <div class="form-group">
        <label for="name">Item Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
    </div>

    <!-- Attachment -->
    <div class="form-group">
        <label for="attachment">Attachment</label>
        <input type="file" class="form-control-file @error('attachment') is-invalid @enderror" id="attachment" name="attachment">
        @error('attachment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
    </div>

    <!-- Status -->
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
            <option value="Active" selected>Active</option>
            <option value="Inactive">Inactive</option>
        </select>
        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
