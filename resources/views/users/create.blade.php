@extends('layouts.app')

@section('content')
    <div class="ml-4 mr-4">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="mb-4">
                    <div class="font-medium text-red-600">
                        {{ __('Whoops! Something went wrong.') }}
                    </div>

                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="text-center my-2">
                @if (session('success'))
                    <div class="font-medium text-green-600">
                        {{ session('success') }}
                    </div>
                @endif
            </div>


                <div class="col-span-12 mb-3">
                    <label for="name" class="label-control">الاسم:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           class="form-control"
                           placeholder="Name" required>
                </div>
                <div class="col-span-12 mb-3">
                    <label for="email" class="label-control">الايميل:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           class="form-control"
                           placeholder="Email" required>
                </div>
                <div class="col-span-12 mb-3">
                    <label for="password" class="label-control">كلمة المرور</label>
                    <input type="password" id="password" name="password"
                           class="form-control"
                           placeholder="Password" required>
                </div>
                <div class="col-span-12 mb-3">
                    <label for="confirm-password" class="label-control">تأكيد كلمة المرور</label>
                    <input type="password" id="confirm-password" name="password_confirmation"
                           class="form-control"
                           placeholder="Confirm Password" required>
                </div>
                <div class="col-span-12 mb-3">
                    <label for="roles" class="label-control">الصلاحية:</label>
                    @foreach ($allRoles as $roleName => $roleLabel)
                        <label class="inline-flex items-center mt-2">
                            <input type="checkbox" name="roles[]" value="{{ $roleName }}">
                            <span class="ml-2">{{ $roleLabel }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="col-span-12 mb-3 text-center">
                    <button type="submit"
                    style="width: 30%;"
                            class="btn btn-success">
                        اضافة
                    </button>
                </div>
        </form>
    </div>

@endsection