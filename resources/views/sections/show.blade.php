@extends('layouts.app')

@section('content')
    <h2>📂 تفاصيل القسم</h2>

    <table class="table">
        <tr>
            <th>اسم القسم:</th>
            <td>{{ $section->name }}</td>
        </tr>
    </table>
    
    <a href="{{ route('sections.index') }}" class="btn btn-secondary">رجوع</a>
@endsection
