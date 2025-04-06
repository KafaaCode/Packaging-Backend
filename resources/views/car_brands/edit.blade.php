@extends('layouts.app')

@section('content')
    <h2>✏️ تعديل العلامة التجارية</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('car_brands.update', $carBrand->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>الاسم</label>
            <input type="text" name="name" class="form-control" value="{{ $carBrand->name }}" required>
        </div> 

        <div class="mb-3">
            <label>العلامة</label>
            <input type="text" name="Brand" class="form-control" value="{{ $carBrand->Brand }}" required>
        </div>

        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
@endsection
