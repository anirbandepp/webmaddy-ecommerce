<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order\OrderModel;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = OrderModel::with('orderByUser', 'orderDetails')->get();
        return view('admin.pages.order.list')->with(['orders' => $orders]);
    }

    public function fetchOrder($id)
    {
        $order = OrderModel::find($id);
        return view('admin.pages.order.edit')->with(['order' => $order]);
    }

    public function updateOrder(Request $r)
    {
        $this->validate($r, [
            'id' => [
                'required',
                Rule::unique('orders')->ignore($r->id, 'id')
            ],
            'order_status' => [
                'required',
                Rule::in([
                    'active', 'pending', 'cancelled', 'processing', 'shipped', 'complete', 'review'
                ]),
            ]
        ]);

        $orderStatus = OrderModel::find($r->id);
        $orderStatus->order_status = $r->order_status;
        $orderStatus->update();

        $r->session()->flash('success', 'order status updated successfully.');
        return redirect()->route('administrator.order.order_list');
    }

    public function orderStatus($status)
    {
        $orders = OrderModel::where('order_status', $status)
            ->with('orderByUser', 'orderDetails')
            ->get();

        return view('admin.pages.order.orderstatus')->with(['orders' => $orders]);
    }
}
