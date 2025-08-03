@extends('layouts.master')

@section('title', 'سلة التسوق')

@section('content')
<main id="content" role="main" class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb p-3 rounded">
            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">سلة التسوق</li>
        </ol>
    </nav>

    <!-- Title and Back Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">سلة التسوق</h2>
        <a href="/categories" class="btn btn-outline-primary">
            <i class="fas fa-arrow-right"></i> متابعة التسوق
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
        <div class="row g-4 mb-4">
            @foreach($cart as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ $item['name'] }}</h5>
                            <div class="mb-2">
                                <span class="badge bg-success fs-6">{{ $item['price'] }} ل.س</span>
                            </div>
                            <div class="mb-2">الكمية: <strong>{{ $item['quantity'] }}</strong></div>
                            <div class="mb-2">الإجمالي: <strong>{{ $item['price'] * $item['quantity'] }} ل.س</strong></div>
                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mt-2">حذف</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-warning">إفراغ السلة</button>
        </form>
    @else
        <div class="text-center py-5">
            <img src="{{ asset('image.png') }}" alt="سلة التسوق فارغة" class="mb-2" style="max-width: 300px;">
            <h4 class="text-muted">سلة التسوق فارغة.</h4>
        </div>
    @endif
</main>
@endsection
