
@extends('layouts.app')

@section('content')
    <h2>✏️ تعديل بيانات السيارة</h2>

    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf @method('PUT')
        
        <div class="mb-3">
            <label>اسم السيارة</label>
            <input type="text" name="name" class="form-control" value="{{ $car->name }}" required>
        </div>
        <div class="mb-3">
            <label>نوع الوقود</label>
            <input type="text" name="fuel_type" class="form-control" value="{{ $car->fuel_type }}" required>
        </div>
        <div class="mb-3">
            <label>المخصص الشهري</label>
            <input type="number" name="monthly_allowance" class="form-control" value="{{ $car->monthly_allowance }}" required>
        </div>
        <div class="mb-3">
            <label>رقم السيارة</label>
            <input type="text" name="plate_number" class="form-control" value="{{ $car->plate_number }}" required>
        </div>
        <div class="mb-3">
            <label>القسم</label>
            <select name="section_id" class="form-control">
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ $car->section_id == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
@endsection
