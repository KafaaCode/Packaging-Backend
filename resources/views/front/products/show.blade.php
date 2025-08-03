@extends('layouts.master')

@section('title', 'تفاصيل المنتج')

@section('content')
    <main id="content" role="main" class="container py-5">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb p-3 rounded">

            </ol>
        </nav>

        <!-- Title and Back Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('categories.web.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-right"></i> رجوع
            </a>
        </div>

        <!-- Product Detail -->
        <div class="row g-5 align-items-start">
            <!-- Product Image -->
            <div class="col-md-6">
                <div class="border rounded p-3 bg-white shadow-sm">
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded"
                        alt="{{ $product->name }}">
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-md-6">
                <div class="bg-white p-4 rounded shadow-sm">
                    <h2 class="mb-3">{{ $product->name }}</h2>

                    <div class="mb-3 text-muted">
                        <i class="fas fa-barcode me-2"></i>
                        <strong>الرقم التسلسلي:</strong> {{ $product->serial_number }}
                    </div>

                    <div class="mb-3">
                        <span class="badge bg-success fs-5">
                            {{ number_format($product->price, 2) }} <small>ل.س</small>
                        </span>
                    </div>

                    <p class="text-secondary lh-lg">
                        {{ $product->description }}
                    </p>

                    <!-- Actions -->
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <form method="POST" action="{{ route('cart.add', $product->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-shopping-cart me-1"></i> أضف إلى السلة
                            </button>
                        </form>

                        <form method="POST" action="#">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-lg">
                                <i class="fas fa-heart me-1"></i> أضف إلى المفضلة
                            </button>
                        </form>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-4">
                        <a href="{{ route('categories.web.index') }}" class="btn btn-link text-decoration-none">
                            <i class="fas fa-arrow-right"></i> رجوع إلى الفئات
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection