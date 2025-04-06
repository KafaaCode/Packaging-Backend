@extends('layouts.app')

@section('content')
    <h2>⛽ إضافة عملية تعبئة جديدة</h2>

    <!-- عرض رسالة الخطأ -->
    @if(session('error'))
        <div class="alert alert-danger">
            <strong>تنبيه!</strong> {{ session('error') }}
        </div>
    @endif

    <!-- عرض رسالة النجاح -->
    @if(session('success'))
        <div class="alert alert-success">
            <strong>نجاح!</strong> {{ session('success') }}
        </div>
    @endif

    <!-- عرض المستحقات المتبقية للسيارة -->
    @if(session('car_remaining_allowance'))
        <div class="mb-3">
            <label>المستحقات المتبقية للسيارة</label>
            <input type="text" class="form-control" value="{{ session('car_remaining_allowance') }}" disabled>
        </div>
    @endif

    <form action="{{ route('refuelings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>السيارة</label>
            <select name="car_id" class="form-control" required>
                <option value="">اختر سيارة</option>
                @foreach ($cars as $car)
                <option value="{{ $car->id }}">
                    {{ $car->name }} - 
                    {{ $car->drivers->pluck('name')->join(', ') ?: 'بدون سائق' }}
                    {{ $car->drivers->pluck('surname')->join(', ') ?: '' }} - 
                    {{ $car->section->name ?? 'بدون قسم' }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>الخزان</label>
            <select name="tank_id" class="form-control" required id="tank_id">
                <option value="">اختر خزان</option>
                @foreach ($tanks as $tank)
                    <option value="{{ $tank->id }}" data-remaining="{{ $tank->remaining_quantity }}">{{ $tank->name }}</option>
                @endforeach
            </select>
        </div>

        @if(session('tank_remaining_quantity'))
            <div class="mb-3">
                <label>الكمية المتبقية في الخزان</label>
                <input type="text" id="remaining_quantity" class="form-control" value="{{ session('tank_remaining_quantity') }}" disabled>
            </div>
        @endif

        <div class="mb-3">
            <label>الكمية المعبأة</label>
            <input type="number" name="filled_quantity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>التاريخ</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">إضافة</button>
    </form>
@endsection

