@extends('layouts.app')

@section('content')
    <h2>✏️ تعديل بيانات السائق</h2>

    <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
        @csrf @method('PUT')
        
        <div class="mb-3">
            <label>اسم السائق</label>
            <input type="text" name="name" class="form-control" value="{{ $driver->name }}" required>
        </div>
        <div class="mb-3">
            <label>اسم الكنية</label>
            <input type="text" name="surname" class="form-control" value="{{ $driver->surname }}" required>
        </div>
        <div class="mb-3">
            <label>اسم الاب</label>
            <input type="text" name="father_name" class="form-control" value="{{ $driver->father_name }}" required>
        </div>
        <div class="mb-3">
            <label>رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" value="{{ $driver->phone }}" required>
        </div>
        <div class="mb-3">
            <label>القسم</label>
            <select name="section_id" class="form-control">
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ $driver->section_id == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>السيارة</label>
            <select name="car_id" class="form-control">
                @foreach($cars as $car)
                    <option value="{{ $car->id }}" {{ $driver->car_id == $section->id ? 'selected' : '' }}>{{ $car->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
@endsection
