<!-- resources/views/tanks/calculate.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">🛢️ حساب الوقود المتبقي - {{ $tank->name }}</h2>

        <div class="card">
            <div class="card-body">
                <form id="calculationForm">
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <label class="form-label">ارتفاع الوقود الحالي (متر)</label>
                            <input type="number" step="0.01" id="current_height" class="form-control" 
                                   max="{{ $tank->height }}" required>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary w-100">احسب الآن</button>
                        </div>
                    </div>
                </form>

                <div id="result" class="mt-4" style="display: none;">
                    <h4 class="text-success">النتائج:</h4>
                    <p>الكمية المتبقية: <span id="remainingQuantity" class="fw-bold"></span> لتر</p>
                    <p>نسبة التعبئة: <span id="percentage" class="fw-bold"></span>%</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('calculationForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const response = await fetch(`{{ route('tanks.calculate', $tank) }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    current_height: document.getElementById('current_height').value
                })
            });

            const data = await response.json();
            
            document.getElementById('remainingQuantity').textContent = data.remaining;
            document.getElementById('percentage').textContent = data.percentage;
            document.getElementById('result').style.display = 'block';
        });
    </script>
@endsection