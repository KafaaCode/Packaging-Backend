@extends('layouts.app')

@section('content')
    <h2>🚗 تفاصيل السيارة: {{ $car->name }}</h2>

    <!-- عرض تفاصيل السيارة -->
    <p><strong>نوع الوقود:</strong> {{ $car->fuel_type }}</p>
    <p><strong>المخصص الشهري:</strong> {{ number_format($car->monthly_allowance, 2) }}</p>
    <p><strong>رقم السيارة:</strong> {{ $car->plate_number }}</p>
    <p><strong>القسم:</strong> {{ $car->section->name }}</p>

    <!-- عرض عمليات التعبئة الخاصة بالسيارة -->
    <h3>عمليات التعبئة:</h3>
    @if ($refuelings->isEmpty())
        <p>لا توجد عمليات تعبئة لهذه السيارة بعد.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الكمية المعبأة</th>
                    <th>التاريخ</th>
                    <th>الخزان</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($refuelings as $refueling)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ number_format($refueling->filled_quantity, 2) }}</td>
                        <td>{{ $refueling->date }}</td>
                        <td>{{ $refueling->tank->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
