@extends('layouts.app')

@section('content')
    <h2>✏️ تعديل بيانات الخزان</h2>

    <form action="{{ route('tanks.update', $tank->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>اسم الخزان</label>
            <input type="text" name="name" class="form-control" value="{{ $tank->name }}" required>
        </div>
        <div class="mb-3">
            <label>نوع الوقود</label>
            <!-- <input type="text" name="fuel_type" class="form-control" value="{{ $tank->fuel_type }}" required> -->
            <select name="fuel_type" id="car_id" class="form-control">
                <option value="بنزين">بنزين</option>
                <option value="مازوت">مازوت</option>
            </select>
        </div>
        <!-- <div class="mb-3">
            <label>المتبقي</label>
            <input type="number" name="remaining" class="form-control" value="{{ $tank->remaining }}" required>
        </div> -->
        <div class="mb-3">
            <label>السعة الكلية</label>
            <input type="number" name="total_capacity" class="form-control" value="{{ $tank->total_capacity }}" required>
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
@endsection
