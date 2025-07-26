<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function webShow(Product $product)
    {
        return view('front.products.show', compact('product'));
    }






















    // api
    // استرجاع جميع المنتجات
    public function index()
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'لا توجد منتجات'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'تم استرجاع المنتجات بنجاح',
            'data' => $products
        ], 200);
    }


    public function productsCategory($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'الفئة غير موجودة'
            ], 404);
        }

        // جلب المنتجات مع تفاصيل الفئة
        $products = $category->products()->with('category')->get();

        if ($products->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'لا توجد منتجات متاحة في هذه الفئة'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'تم استرجاع المنتجات بنجاح',
            'data' => $products
        ], 200);
    }


    // إضافة منتج جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'serial_number' => 'required|string|unique:products',
            'description' => 'nullable|string',
            'category_id' => 'required',
            'image' => 'nullable|image',
            'request_number' => 'nullable|integer',
            'price' => 'required|numeric',
            'active' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');

        }

        $product = Product::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'تم إنشاء المنتج بنجاح',
            'data' => $product
        ], 201);
    }


    // استرجاع منتج محدد
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'المنتج غير موجود'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'تم استرجاع المنتج بنجاح',
            'data' => $product
        ], 200);
    }

    // تعديل بيانات منتج
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'المنتج غير موجود'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'serial_number' => 'sometimes|required|string|unique:products,serial_number,' . $product->id,
            'description' => 'sometimes|nullable|string',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'sometimes|required',
            'request_number' => 'sometimes|nullable|integer',
            'price' => 'sometimes|numeric',
            'active' => 'sometimes|nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إن وُجدت
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'تم تحديث المنتج بنجاح',
            'data' => $product
        ], 200);
    }


    // حذف منتج
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'المنتج غير موجود'
            ], 404);
        }
        $product->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'تم حذف المنتج بنجاح'
        ], 200);
    }
}
