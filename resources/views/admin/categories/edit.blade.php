@extends('admin.layouts.app')

@section('content')
    <h1>Edit Category</h1>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="country_id">Country</label>
            <select name="country_id" id="country_id" class="form-control" required>
                <option value="">Select Country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ $country->id == $category->country_id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="specialization_id">Specialization</label>
            <select name="specialization_id" id="specialization_id" class="form-control" required>
                <option value="">Select Specialization</option>
                @foreach ($specializations as $specialization)
                    <option value="{{ $specialization->id }}" {{ $specialization->id == $category->specialization_id ? 'selected' : '' }}>{{ $specialization->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
@endsection
