@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Search Items</h2>

    <form method="GET" action="{{ route('items.search') }}" class="mb-4">
        <div class="row g-2">
            <div class="col-md-3">
                <input type="text" name="search_code" class="form-control" placeholder="Search by Code" value="{{ request('search_code') }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="search_name" class="form-control" placeholder="Search by Name" value="{{ request('search_name') }}">
            </div>
            <div class="col-md-3">
                <select name="search_status" class="form-control">
                    <option value="">All Status</option>
                    <option value="Active" {{ request('search_status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ request('search_status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </div>
    </form>

    @if($items->count() > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->code }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No items found.</p>
    @endif
</div>
@endsection
