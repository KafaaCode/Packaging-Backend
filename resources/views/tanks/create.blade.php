@extends('layouts.app')

@section('content')
    <h2>🛢️ إضافة خزان جديد</h2>

    <form action="{{ route('tanks.store') }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <div class="mb-3">
            <label class="mb-1">اسم الخزان</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="mb-1">نوع الوقود</label>
            <select name="fuel_type" class="form-control" required>
                <option value="بنزين">بنزين</option>
                <option value="مازوت">مازوت</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label class="mb-1">طريقة الإدخال</label>
            <div>
                <input type="radio" name="capacity_method" id="manual" value="manual" checked> 
                <label for="manual">يدوي</label>
                <input type="radio" name="capacity_method" id="calculate" value="calculate">
                <label for="calculate">حسابي</label>
            </div>
        </div>

        <div id="calculateSection" style="display: none;">
            <div class="mb-3">
                <label class="mb-1">شكل الخزان</label>
                <select name="tank_shape" id="tankShape" class="form-control">
                    <option value="rectangle">مستطيل</option>
                    <option value="square">مربع</option>
                </select>
            </div>

            <div id="rectangleFields">
                <div class="mb-3">
                    <label class="mb-1">الطول (متر)</label>
                    <input type="number" step="0.01" name="length" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="mb-1">العرض (متر)</label>
                    <input type="number" step="0.01" name="width" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="mb-1">الارتفاع (متر)</label>
                    <input type="number" step="0.01" name="height_rect" class="form-control">
                </div>
            </div>

            <div id="squareFields" style="display: none;">
                <div class="mb-3">
                    <label class="mb-1">طول الضلع (متر)</label>
                    <input type="number" step="0.01" name="side" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="mb-1">الارتفاع (متر)</label>
                    <input type="number" step="0.01" name="height_square" class="form-control">
                </div>
            </div>

            <button type="button" onclick="calculateCapacity()" class="btn btn-primary mb-3">احسب السعة</button>
        </div>

        <div class="mb-3">
            <label class="mb-1">السعة الكلية (لتر)</label>
            <input type="number" name="total_capacity" id="total_capacity" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">إضافة</button>
    </form>

    <script>
        document.getElementById('manual').addEventListener('change', function() {
            document.getElementById('calculateSection').style.display = 'none';
        });
        document.getElementById('calculate').addEventListener('change', function() {
            document.getElementById('calculateSection').style.display = 'block';
        });

        document.getElementById('tankShape').addEventListener('change', function() {
            if (this.value === 'rectangle') {
                document.getElementById('rectangleFields').style.display = 'block';
                document.getElementById('squareFields').style.display = 'none';
            } else {
                document.getElementById('rectangleFields').style.display = 'none';
                document.getElementById('squareFields').style.display = 'block';
            }
        });

        function calculateCapacity() {
            const shape = document.getElementById('tankShape').value;
            let volume = 0;

            if (shape === 'rectangle') {
                const length = parseFloat(document.querySelector('[name="length"]').value);
                const width = parseFloat(document.querySelector('[name="width"]').value);
                const height = parseFloat(document.querySelector('[name="height_rect"]').value);
                volume = length * width * height;
            } else {
                const side = parseFloat(document.querySelector('[name="side"]').value);
                const height = parseFloat(document.querySelector('[name="height_square"]').value);
                volume = side * side * height;
            }

            document.getElementById('total_capacity').value = (volume * 1000).toFixed(2);
        }

        function validateForm() {
            const method = document.querySelector('[name="capacity_method"]:checked').value;
            if (method === 'calculate') {
                const inputs = document.querySelectorAll('#calculateSection input');
                for (let input of inputs) {
                    if (!input.value || input.value <= 0) {
                        alert('الرجاء إدخال جميع الأبعاد بشكل صحيح!');
                        return false;
                    }
                }
            }
            return true;
        }
    </script>
@endsection