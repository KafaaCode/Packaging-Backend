@extends('layouts.app')

@section('content')
    <h2>📂 إضافة قسم جديد</h2>

    <form action="{{ route('sections.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>اسم القسم</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <!-- <div class="mb-3">
            <label>مدير القسم</label>
            <input type="text" name="manager" class="form-control" required>
        </div> -->
        <button type="submit" class="btn btn-success">إضافة</button>
    </form>
@endsection
