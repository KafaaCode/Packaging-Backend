<!-- resources/views/tanks/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mb-1">🛢️ قائمة الخزانات</h1>
    
    <a href="{{ route('tanks.create') }}" class="btn btn-primary mb-2">إضافة خزان جديد</a>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>الاسم</th>
                    <th>نوع الوقود</th>
                    <th>السعة الكلية</th>
                    <th>المتبقي</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tanks as $tank)
                <tr>
                    <td>{{ $tank->name }}</td>
                    <td>{{ $tank->fuel_type }}</td>
                    <td>{{ number_format($tank->total_capacity, 2) }} لتر</td>
                    <td>{{ number_format($tank->remaining_quantity, 2) }} لتر</td>
                    <td>
                        <a href="{{ route('tanks.calculate', $tank) }}" class="btn btn-sm btn-success">
                            احسب الكمية
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection