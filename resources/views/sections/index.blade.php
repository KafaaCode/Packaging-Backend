@extends('layouts.app')

@section('content')
    <h2>📂 قائمة الأقسام</h2>
    <a href="{{ route('sections.create') }}" class="btn btn-primary mb-3">إضافة قسم جديد</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>اسم القسم</th>
                <!-- <th>مدير القسم</th> -->
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sections as $section)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $section->name }}</td>
                <!-- <td>{{ $section->manager }}</td> -->
                <td>
                    <a href="{{ route('sections.show', $section->id) }}" class="btn btn-info btn-sm">عرض</a>
                    <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
