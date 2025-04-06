@extends('layouts.app')

@section('content')
    <h2 class="mb-1">⛽ قائمة عمليات التعبئة</h2>
    @can('اضافة تعبئة وقود')
        @if($tanks->where('remaining_quantity', '>', 0)->isNotEmpty())
            @if(!$cars->isEmpty())
                <a href="{{ route('refuelings.create') }}" class="btn btn-primary mb-1">إضافة عملية تعبئة جديدة</a>
            @else
                <div class="alert alert-warning mt-3">
                    ⚠️ لا يوجد سيارات، لا يمكن إضافة تعبئة جديدة.
                </div>
            @endif
        @else
            <div class="alert alert-warning mt-3">
                ⚠️ لا يوجد خزانات متاحة أو جميع الخزانات فارغة، لا يمكن إضافة تعبئة جديدة.
            </div>
        @endif
    @endcan

    <form method="GET" action="{{ route('refuelings.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="car_id">السيارة:</label>
                <select name="car_id" id="car_id" class="form-control">
                    <option value="">جميع السيارات</option>
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}" {{ request('car_id') == $car->id ? 'selected' : '' }}>
                            {{ $car->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="tank_id">الخزان:</label>
                <select name="tank_id" id="tank_id" class="form-control">
                    <option value="">جميع الخزانات</option>
                    @foreach($tanks as $tank)
                        <option value="{{ $tank->id }}" {{ request('tank_id') == $tank->id ? 'selected' : '' }}>
                            {{ $tank->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="date">التاريخ:</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-3 mt-1 align-self-end">
                <button type="submit" class="btn btn-primary">بحث</button>
                <a href="{{ route('refuelings.index') }}" class="btn btn-secondary">إعادة تعيين</a>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>السيارة</th>
                <th>الخزان</th>
                <th>الكمية المعبأة</th>
                <th>التاريخ</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($refuelings as $refueling)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $refueling->car->name }}</td>
                    <td>{{ $refueling->tank->name }}</td>
                    <td>{{ $refueling->filled_quantity }}</td>
                    <td>{{ $refueling->date }}</td>
                    <td>
                        <a href="{{ route('refuelings.show', $refueling->id) }}" class="btn btn-info btn-sm">عرض</a>
                        @can('تعديل تعبئة وقود')
                            <a href="{{ route('refuelings.edit', $refueling->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        @endcan
                        @can('حذف تعبئة وقود')
                            <form action="{{ route('refuelings.destroy', $refueling->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $refuelings->links('pagination::bootstrap-5') }}
    </div>
@endsection