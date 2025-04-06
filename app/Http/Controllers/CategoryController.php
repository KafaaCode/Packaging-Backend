<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // استرجاع جميع الفئات
    public function index()
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'لا توجد فئات متاحة'
            ], 404);
        }
        
        return response()->json([
            'status'  => 'success',
            'message' => 'تم استرجاع الفئات بنجاح',
            'data'    => $categories
        ], 200);
    }

    // إضافة فئة جديدة
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'image'             => 'nullable|string',
            'country_id'        => 'required|exists:countries,id',
            'specialization_id' => 'required|exists:specializations,id',
            'active'            => 'nullable|boolean'
        ]);

        $category = Category::create($validated);

        return response()->json([
            'status'  => 'success',
            'message' => 'تم إنشاء الفئة بنجاح',
            'data'    => $category
        ], 201);
    }

    // استرجاع فئة محددة
    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'status'  => 'error',
                'message' => 'الفئة غير موجودة'
            ], 404);
        }
        return response()->json([
            'status'  => 'success',
            'message' => 'تم استرجاع الفئة بنجاح',
            'data'    => $category
        ], 200);
    }

    // تعديل بيانات فئة
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'status'  => 'error',
                'message' => 'الفئة غير موجودة'
            ], 404);
        }

        $validated = $request->validate([
            'name'              => 'sometimes|required|string|max:255',
            'image'             => 'sometimes|nullable|string',
            'country_id'        => 'sometimes|required|exists:countries,id',
            'specialization_id' => 'sometimes|required|exists:specializations,id',
            'active'            => 'sometimes|nullable|boolean'
        ]);

        $category->update($validated);

        return response()->json([
            'status'  => 'success',
            'message' => 'تم تحديث الفئة بنجاح',
            'data'    => $category
        ], 200);
    }

    // حذف فئة
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'status'  => 'error',
                'message' => 'الفئة غير موجودة'
            ], 404);
        }
        $category->delete();
        return response()->json([
            'status'  => 'success',
            'message' => 'تم حذف الفئة بنجاح'
        ], 200);
    }
}
