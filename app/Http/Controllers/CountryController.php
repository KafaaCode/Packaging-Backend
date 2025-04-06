<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    // استرجاع جميع الدول
    public function index()
    {
        $countries = Country::all();

        if ($countries->isEmpty()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'لا توجد دول متاحة'
            ], 404);
        }
        
        return response()->json([
            'status'  => 'success',
            'message' => 'تم استرجاع الدول بنجاح',
            'data'    => $countries
        ], 200);
    }

    // إضافة دولة جديدة
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $country = Country::create($validated);

        return response()->json([
            'status'  => 'success',
            'message' => 'تم إنشاء الدولة بنجاح',
            'data'    => $country
        ], 201);
    }

    // استرجاع دولة محددة
    public function show($id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json([
                'status'  => 'error',
                'message' => 'الدولة غير موجودة'
            ], 404);
        }
        return response()->json([
            'status'  => 'success',
            'message' => 'تم استرجاع الدولة بنجاح',
            'data'    => $country
        ], 200);
    }

    // تعديل بيانات دولة
    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json([
                'status'  => 'error',
                'message' => 'الدولة غير موجودة'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255'
        ]);

        $country->update($validated);

        return response()->json([
            'status'  => 'success',
            'message' => 'تم تحديث الدولة بنجاح',
            'data'    => $country
        ], 200);
    }

    // حذف دولة
    public function destroy($id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json([
                'status'  => 'error',
                'message' => 'الدولة غير موجودة'
            ], 404);
        }
        $country->delete();
        return response()->json([
            'status'  => 'success',
            'message' => 'تم حذف الدولة بنجاح'
        ], 200);
    }
}
