<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // استرجاع جميع الطلبات
    public function index()
    {
        $orders = Order::all();

        if ($orders->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'لا توجد طلبات'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'تم استرجاع الطلبات بنجاح',
            'data' => $orders
        ], 200);
    }

    public function myOrders(Request $request)
    {
        $user = $request->user();

        $orders = Order::with('orderDetails')
            ->where('user_id', $user->id)
            ->get();

        if ($orders->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'لا توجد طلبات لهذا المستخدم'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'تم استرجاع الطلبات الخاصة بالمستخدم بنجاح',
            'data' => $orders
        ], 200);
    }


    public function store(Request $request)
    {
        $rules = [
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric',
            'delivery_time' => 'nullable|date',
            'reply_message' => 'nullable|string',
            'total_price' => 'required|numeric',

            'order_details' => 'required|array|min:1',
            'order_details.*.product_id' => 'required|exists:products,id',
            'order_details.*.quantity' => 'required|integer|min:1',
        ];

        $validated = $request->validate($rules);

        DB::beginTransaction();
        try {
            $validated['status'] = 'pending';
            $order = Order::create([
                'user_id' => $validated['user_id'],
                'total_amount' => $validated['total_amount'],
                'status' => $validated['status'],
                'delivery_time' => $validated['delivery_time'] ?? null,
                'reply_message' => $validated['reply_message'] ?? null,
                'total_price' => $validated['total_price']
            ]);


            foreach ($validated['order_details'] as $detail) {
                $order->orderDetails()->create([
                    'product_id' => $detail['product_id'],
                    'quantity' => $detail['quantity']
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => isset($validated['order_id'])
                    ? 'تم تحديث الطلب وتفاصيله بنجاح'
                    : 'تم إنشاء الطلب وتفاصيله بنجاح',
                'data' => $order->load('orderDetails')
            ], isset($validated['order_id']) ? 200 : 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'حدث خطأ أثناء حفظ الطلب وتفاصيله: ' . $e->getMessage()
            ], 500);
        }
    }


    public function show($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json([
                'status' => 'error',
                'message' => 'الطلب غير موجود'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'تم استرجاع الطلب بنجاح',
            'data' => $order
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json([
                'status' => 'error',
                'message' => 'الطلب غير موجود'
            ], 404);
        }

        $rules = [
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric',
            'delivery_time' => 'nullable|date',
            'status' => 'sometimes|nullable|string|in:pending,delivery,partial delivery,completed,canceled',
            'reply_message' => 'nullable|string',
            'total_price' => 'required|numeric',

            'order_details' => 'required|array|min:1',
            'order_details.*.product_id' => 'required|exists:products,id',
            'order_details.*.quantity' => 'required|integer|min:1',
        ];

        $validated = $request->validate($rules);

        $order->update([
            'user_id' => $validated['user_id'],
            'total_amount' => $validated['total_amount'],
            'status' => $validated['status'],
            'delivery_time' => $validated['delivery_time'] ?? null,
            'reply_message' => $validated['reply_message'] ?? null,
            'total_price' => $validated['total_price']
        ]);

        $order->orderDetails()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'تم تحديث الطلب بنجاح',
            'data' => $order
        ], 200);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json([
                'status' => 'error',
                'message' => 'الطلب غير موجود'
            ], 404);
        }
        $order->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'تم حذف الطلب بنجاح'
        ], 200);
    }
}
