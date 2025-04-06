@extends('layouts.app')

@section('content')
    <h2>⛽ تفاصيل عملية التعبئة</h2>

    <table class="table">
        <tr>
            <th>السيارة:</th>
            <td>{{ $refueling->car->name }}</td>
        </tr>
        <tr>
            <th>الخزان:</th>
            <td>{{ $refueling->tank->name }}</td>
        </tr>
        <tr>
            <th>الكمية المعبأة:</th>
            <td>{{ $refueling->quantity }}</td>
        </tr>
        <tr>
            <th>التاريخ:</th>
            <td>{{ $refueling->date }}</td>
        </tr>
    </table>
    
    <a href="{{ route('refuelings.index') }}" class="btn btn-secondary">رجوع</a>
@endsection
