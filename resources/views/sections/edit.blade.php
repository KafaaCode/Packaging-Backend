@extends('layouts.app')

@section('content')
    <h2>✏️ تعديل بيانات القسم</h2>
    <form action="{{ route('sections.update', $section->id) }}" method="POST">
        @csrf @method('PUT')
        
        <div class="mb-3">
            <label>اسم القسم</label>
            <input type="text" name="name" class="form-control" value="{{ $section->name }}" required>
        </div>
        <!-- <div class="mb-3">
            <label>مدير القسم</label>
            <input type="text" name="manager" class="form-control" value="{{ $section->manager }}" required>
        </div> -->
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
@endsection
