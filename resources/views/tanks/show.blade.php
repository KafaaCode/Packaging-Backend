@extends('layouts.app')

@section('content')
    <h2>🛢️ تفاصيل الخزان</h2>

    <table class="table">
        <tr>
            <th>اسم الخزان:</th>
            <td>{{ $tank->name }}</td>
        </tr>
        <tr>
            <th>نوع الوقود:</th>
            <td>{{ $tank->fuel_type }}</td>
        </tr>
        <tr>
            <th>المتبقي:</th>
            <td>{{ $tank->remaining }}</td>
        </tr>
        <tr>
            <th>السعة الكلية:</th>
            <td>{{ $tank->total_capacity }}</td>
        </tr>
    </table>
    
    <a href="{{ route('tanks.index') }}" class="btn btn-secondary">رجوع</a>
@endsection
