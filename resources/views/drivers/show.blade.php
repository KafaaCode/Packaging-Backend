@extends('layouts.app')

@section('content')
    <h2>🚖 تفاصيل السائق</h2>

    <table class="table">
        <tr>
            <th>اسم السائق:</th>
            <td>{{ $driver->name }}</td>
        </tr>
        <tr>
            <th>رقم الهاتف:</th>
            <td>{{ $driver->phone }}</td>
        </tr>
        <tr>
            <th>القسم:</th>
            <td>{{ $driver->section->name }}</td>
        </tr>
    </table>
    
    <a href="{{ route('drivers.index') }}" class="btn btn-secondary">رجوع</a>
@endsection
