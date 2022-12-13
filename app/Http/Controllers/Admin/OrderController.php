<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user')
            ->orderBy('created_at', 'DESC')
            ->get();
        
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('user', 'orderDetails.product')
            ->where('id', $id)
            ->firstOrFail();

        return view('admin.order.show', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        try {
            $order = Order::where('id', $id)->firstOrFail();
            $this->handleUpdateOrder($order->id);
            $order->status = !boolval($order->status);
            $order->save();

            Session::flash('success', __('admin.edit_success_message'));

            return redirect()->route('orders.index');
        } catch (\Exception $ex) {
            Session::flash('error', __('admin.edit_fail_message'));

            return redirect()->route('orders.index');
        }
    }

    public function handleUpdateOrder($orderId)
    {
        $products = OrderDetail::select('product_id', 'quantity')->where('order_id', $orderId)->get();
        foreach ($products as $product) {
            $productStore = Product::select('quantity')->where('id', $product->product_id)->firstOrFail();
            Product::where('id', $product->product_id)
                ->update(['quantity' => $productStore->quantity - $product->quantity]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::where('id', $id)->firstOrFail();
        $order->products()->detach();
        $order->delete();
        Session::flash('success', __('admin.delete_success_message'));

        return redirect()->route('orders.index');
    }

    public function getList()
    {
        $orders = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select('users.id', 'users.name', 'users.phone', 'users.address', DB::raw('SUM(orders.total) as "total"'))
            ->groupBy('users.id', 'users.name', 'users.phone', 'users.address')
            ->orderBy('total', 'DESC')
            ->get();

        return view('admin.order.get_list', compact('orders'));
    }
}
