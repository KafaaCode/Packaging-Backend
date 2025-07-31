@extends('admin.layouts.app')

@section('content')
    <h1>Category Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text">Country: {{ $category->country->name }}</p>
            <p class="card-text">Specialization: {{ $category->specialization->name }}</p>
            @if ($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid">
            @endif
        </div>
    </div>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to Categories</a>
@endsection
