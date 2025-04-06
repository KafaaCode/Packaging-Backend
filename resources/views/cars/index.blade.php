@extends('layouts.app')

@section('content')
    <h2>🚗 قائمة السيارات</h2>
    
    

    @if(!$sections->isEmpty())
        <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">إضافة سيارة جديدة</a>
        @else
        <button href="{{ route('cars.create') }}" disabled class="btn btn-primary mb-1">إضافة سيارة جديدة</button>
        <div class="alert alert-warning">
            ⚠️لا يوجد أقسام, قم باضافة قسم أولا
        </div>
    @endif



    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>نوع الوقود</th>
                <th>المخصص الشهري</th>
                <th>المستحقات المتبقية</th>
                <th>رقم السيارة</th>
                <th>القسم</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $car->name }}</td>
                <td>{{ $car->fuel_type }}</td>
                <td>{{ number_format($car->monthly_allowance, 2) }}</td>
                <td>{{ number_format($car->restDues, 2) }}</td> 
                <td>{{ $car->plate_number }}</td>
                <td>{{ $car->section->name }}</td>
                <td>
                    <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info btn-sm">عرض</a>
                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form id="delete-form-{{ $car->id }}" action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $car->id }})">حذف</button>
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