<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\HTTP_ResponseTrait;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use HTTP_ResponseTrait;

    public function webIndex()
    {
        $categories = Category::all();
        return view('front.categories.index', [
            'categories' => $categories
        ]);
    }

    public function webshow($id)
    {
        $category = Category::with('products')->findOrFail($id);

        return view('front.categories.show', [
            'category' => $category,
            'products' => $category->products, 
        ]);
    }






















    // api

    public function adminIndex(Request $request)
    {
        $perPage = $request->query('per_page', 10);

        $categories = Category::paginate($perPage);

        if ($categories->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'لا توجد فئات متاحة'
            ], 404);
        }

        return $this->paginateResponse(
            $categories,
            'تم استرجاع الفئات بنجاح',
            200
        );
    }



    // استرجاع جميع الفئات
    public function index()
    {
        // الحصول على المستخدم من التوكين
        $user = auth()->user();

        // dd($user);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'المستخدم غير موجود'
            ], 404);
        }

        // استرجاع الفئات التي تنتمي للبلد والتخصص الخاص بالمستخدم
        $categories = Category::where('country_id', $user->country_id)
            ->where('specialization_id', $user->specialization_id)
            ->get();

        if ($categories->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'لا توجد فئات متاحة'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'تم استرجاع الفئات بنجاح',
            'data' => $categories
        ], 200);
    }


    // إضافة فئة جديدة
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'country_id' => 'required|exists:countries,id',
            'specialization_id' => 'required|exists:specializations,id',
            'active' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('categories', 'storage');
        }

        $category = Category::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'تم إنشاء الفئة بنجاح',
            'data' => $category
        ], 201);
    }


    // استرجاع فئة محددة
    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'الفئة غير موجودة'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'تم استرجاع الفئة بنجاح',
            'data' => $category
        ], 200);
    }

    // تعديل بيانات فئة
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'الفئة غير موجودة'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'country_id' => 'sometimes|exists:countries,id',
            'specialization_id' => 'sometimes|exists:specializations,id',
            'active' => 'sometimes|nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'تم تحديث الفئة بنجاح',
            'data' => $category
        ], 200);
    }


    // حذف فئة
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'الفئة غير موجودة'
            ], 404);
        }
        $category->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'تم حذف الفئة بنجاح'
        ], 200);
    }
}
