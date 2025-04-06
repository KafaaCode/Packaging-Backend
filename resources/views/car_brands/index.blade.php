@extends('layouts.app')

@section('content')
    <h2>📌 قائمة العلامات التجارية</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('car_brands.create') }}" class="btn btn-primary mb-3">➕ إضافة علامة جديدة</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>العلامة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->Brand }}</td>
                    <td>
                        <a href="{{ route('car_brands.edit', $brand->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        <form action="{{ route('car_brands.destroy', $brand->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
