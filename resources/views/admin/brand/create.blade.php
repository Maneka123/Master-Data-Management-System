@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                    <form action="{{ route('brands.store') }}" method="POST">
    @csrf

    <!-- Brand Code -->
    <div class="form-group">
        <label for="code">Brand Code</label>
        <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}">
        @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>

    <!-- Brand Name -->
    <div class="form-group">
        <label for="name">Brand Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Status -->
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>

    <!-- Submit Button -->
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Create Brand</button>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
