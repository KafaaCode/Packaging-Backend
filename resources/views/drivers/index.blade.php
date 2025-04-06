@extends('layouts.app')

@section('content')
    <h2>🚖 قائمة السائقين</h2>
    <a href="{{ route('drivers.create') }}" class="btn btn-primary mb-3">إضافة سائق جديد</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الكنية</th>
                <th>اسم الاب</th>
                <th>القسم</th>
                <th>رقم الهاتف</th>
                <th>السيارة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($drivers as $driver)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $driver->name }}</td>
                <td>{{ $driver->surname }}</td>
                <td>{{ $driver->father_name }}</td>
                <td>{{ $driver->section->name }}</td>
                <td>{{ $driver->phone }}</td>
                <td>{{ $driver->car->name }}</td>
                <td>
                    <a href="{{ route('drivers.show', $driver->id) }}" class="btn btn-info btn-sm">عرض</a>
                    <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form id="delete-form-{{ $driver->id }}" action="{{ route('drivers.destroy', $driver->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $driver->id }})">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@push('scripts')
<script>
    function confirmDelete(carId) {
        Swal.fire({
            title: 'هل أنت متأكد من الحذف؟',
            text: "لن تتمكن من التراجع عن هذا!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'نعم، احذف!',
            cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + carId).submit();
            }
        });
    }

    @if(session('success'))
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
    @endif
</script>
@endpush