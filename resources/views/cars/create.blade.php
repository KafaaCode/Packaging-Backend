@extends('layouts.app')

@section('content')
    <h2>🚗 إضافة سيارة جديدة</h2>

    <form action="{{ route('cars.store') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label>اسم السيارة</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>نوع السيارة</label>
            <!-- <input type="text" name="car_type" class="form-control" required> -->
            <select name="car_type" class="form-control">
                <option value="none">عدم التحديد</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>نوع الوقود</label>
            <!-- <input type="text" name="fuel_type" class="form-control" required> -->
            <select name="fuel_type" class="form-control">
                <option value="بنزين">بنزين</option>
                <option value="مازوت">مازوت</option>
            </select>
        </div>
        <div class="mb-2">
            <label>المخصص الشهري</label>
            <input type="number" name="monthly_allowance" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>رقم السيارة</label>
            <input type="text" name="plate_number" class="form-control" required>
        </div>
        <div class="mb-2">
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

