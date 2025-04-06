<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // تسجيل حساب جديد
    public function register(Request $request)
    {
        $validated = $request->validate([
            'companyName'       => 'required|string|max:255',
            'name'              => 'required|string|max:255',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|string|min:6|confirmed', // يجب إرسال حقل password_confirmation أيضًا
            'specialization_id' => 'required|exists:specializations,id',
            'country_id'        => 'required|exists:countries,id',
        ]);

        $user = User::create([
            'companyName'       => $validated['companyName'],
            'name'              => $validated['name'],
            'email'             => $validated['email'],
            'password'          => bcrypt($validated['password']),
            'specialization_id' => $validated['specialization_id'],
            'country_id'        => $validated['country_id'],
            'status'            => 1, // الحالة افتراضيًا مفعل
        ]);

        // إنشاء توكن باستخدام Sanctum
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status'  => 'success',
            'message' => 'تم إنشاء الحساب بنجاح',
            'data'    => [
                'user'         => $user,
                'access_token' => $token,
                'token_type'   => 'Bearer'
            ]
        ], 201);
    }

    // تسجيل الدخول
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'بيانات الاعتماد غير صحيحة',
            ], 401);
        }

        // إنشاء توكن جديد
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status'  => 'success',
            'message' => 'تم تسجيل الدخول بنجاح',
            'data'    => [
                'user'         => $user,
                'access_token' => $token,
                'token_type'   => 'Bearer'
            ]
        ], 200);
    }

    // عرض البروفايل الخاص بالمستخدم
    public function profile(Request $request)
    {
        return response()->json([
            'status'  => 'success',
            'message' => 'تم استرجاع البروفايل بنجاح',
            'data'    => $request->user()
        ], 200);
    }

    // تحديث البروفايل
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'companyName'       => 'sometimes|required|string|max:255',
            'name'              => 'sometimes|required|string|max:255',
            'email'             => 'sometimes|required|email|unique:users,email,'.$user->id,
            'specialization_id' => 'sometimes|required|exists:specializations,id',
            'country_id'        => 'sometimes|required|exists:countries,id',
        ]);

        $user->update($validated);

        return response()->json([
            'status'  => 'success',
            'message' => 'تم تحديث البروفايل بنجاح',
            'data'    => $user,
        ], 200);
    }

    // تغيير كلمة المرور بعد التحقق من كلمة المرور الحالية
    public function changePassword(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password'     => 'required|string|min:6|confirmed', // يجب إرسال new_password_confirmation أيضًا
        ]);

        if (!Hash::check($validated['current_password'], $user->password)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'كلمة المرور الحالية غير صحيحة',
            ], 400);
        }

        $user->update([
            'password' => bcrypt($validated['new_password']),
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'تم تغيير كلمة المرور بنجاح',
        ], 200);
    }

    // تسجيل الخروج: إلغاء التوكن الحالي
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'تم تسجيل الخروج بنجاح'
        ], 200);
    }
}
