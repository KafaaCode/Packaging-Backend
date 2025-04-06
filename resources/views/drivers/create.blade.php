@extends('layouts.app')

@section('content')
    <h2>🚖 إضافة سائق جديد</h2>

    <form action="{{ route('drivers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>اسم السائق</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>الكنية</label>
            <input type="text" name="surname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>اسم الاب</label>
            <input type="text" name="father_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>السيارة</label>
            <select name="car_id" class="form-control">
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>القسم</label>
            <select name="section_id" class="form-control">
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">إضافة</button>
    </form>
@endsection
