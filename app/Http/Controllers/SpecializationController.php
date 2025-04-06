<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    // استرجاع جميع التخصصات
    public function index()
    {
        $specializations = Specialization::all();

        if ($specializations->isEmpty()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'لا توجد تخصصات متاحة'
            ], 404);
        }
        
        return response()->json([
            'status'  => 'success',
            'message' => 'تم استرجاع التخصصات بنجاح',
            'data'    => $specializations
        ], 200);
    }

    // إضافة تخصص جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $specialization = Specialization::create($validated);

        return response()->json([
            'status'  => 'success',
            'message' => 'تم إنشاء التخصص بنجاح',
            'data'    => $specialization
        ], 201);
    }

    // استرجاع تخصص محدد
    public function show($id)
    {
        $specialization = Specialization::find($id);
        if (!$specialization) {
            return response()->json([
                'status'  => 'error',
                'message' => 'التخصص غير موجود'
            ], 404);
        }
        return response()->json([
            'status'  => 'success',
            'message' => 'تم استرجاع التخصص بنجاح',
            'data'    => $specialization
        ], 200);
    }

    // تعديل بيانات تخصص
    public function update(Request $request, $id)
    {
        $specialization = Specialization::find($id);
        if (!$specialization) {
            return response()->json([
                'status'  => 'error',
                'message' => 'التخصص غير موجود'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255'
        ]);

        $specialization->update($validated);

        return response()->json([
            'status'  => 'success',
            'message' => 'تم تحديث التخصص بنجاح',
            'data'    => $specialization
        ], 200);
    }

    // حذف تخصص
    public function destroy($id)
    {
        $specialization = Specialization::find($id);
        if (!$specialization) {
            return response()->json([
                'status'  => 'error',
                'message' => 'التخصص غير موجود'
            ], 404);
        }
        $specialization->delete();
        return response()->json([
            'status'  => 'success',
            'message' => 'تم حذف التخصص بنجاح'
        ], 200);
    }
}
