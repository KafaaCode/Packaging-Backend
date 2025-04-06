@extends('layouts.app')

@section('content')
    <h2>➕ إضافة علامة تجارية</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('car_brands.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>الاسم</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>العلامة</label>
            <input type="text" name="Brand" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">إضافة</button>
    </form>
@endsection
