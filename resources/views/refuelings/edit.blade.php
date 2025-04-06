@extends('layouts.app')

@section('content')
    <h2>✏️ تعديل عملية التعبئة</h2>

    <form action="{{ route('refuelings.update', $refueling->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>السيارة</label>
            <select name="car_id" class="form-control" required>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}" {{ $refueling->car_id == $car->id ? 'selected' : '' }}>
                        {{ $car->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>الخزان</label>
            <select name="tank_id" class="form-control" required>
                @foreach ($tanks as $tank)
                    <option value="{{ $tank->id }}" {{ $refueling->tank_id == $tank->id ? 'selected' : '' }}>
                        {{ $tank->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>الكمية المعبأة</label>
            <input type="number" name="quantity" class="form-control" value="{{ $refueling->quantity }}" required>
        </div>
        <div class="mb-3">
            <label>التاريخ</label>
            <input type="date" name="date" class="form-control" value="{{ $refueling->date }}" required>
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
@endsection
