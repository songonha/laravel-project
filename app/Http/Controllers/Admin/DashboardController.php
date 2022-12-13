<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Models\CommentProduct;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $info = $this->getInfor();
        $revenue = $this->statisticRevenue();
        $order = $this->statisticOrder();
        $user = $this->statisticUser();

        return view('admin.dashboard.dashboard', compact('info', 'revenue', 'order', 'user'));
    }

    public function getInfor()
    {
        return [
            'order' => Order::count(),
            'productCategory' => ProductCategory::count(),
            'product' => Product::count(),
            'commentProduct' => CommentProduct::count(),
            'postCategory' => PostCategory::count(),
            'post' => Post::count(),
            'tag' => Tag::count(),
            'user' => User::count(),
        ];
    }
    public function statisticRevenue()
    {
        $order = DB::table('orders')
            ->select(DB::raw('Date(created_at) as date'), DB::raw('COUNT(total) as "order"'), DB::raw('SUM(total / 1000000) as "total"'))
            ->where('created_at', '>=', now()->firstOfMonth())
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $data['date'] = $order->pluck('date')->toArray();
        $data['order'] = $order->pluck('order')->toArray();
        $data['total'] = $order->pluck('total')->toArray();

        return json_encode($data);
    }

    public function statisticRevenueAjax(Request $request)
    {
        $order = Order::select(DB::raw('Date(created_at) as date'), DB::raw('COUNT(total) as "order"'), DB::raw('SUM(total / 1000000) as "total"'))
            ->whereBetween('created_at', [$request->startDay, $request->endDay])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();
        $data['date'] = $order->pluck('date')->toArray();
        $data['order'] = $order->pluck('order')->toArray();
        $data['total'] = $order->pluck('total')->toArray();
        
        return json_encode($data);
    }

    public function statisticOrder()
    {
        $order = Order::select(DB::raw('Date(created_at) as date'), DB::raw('COUNT(total) as "order"'), DB::raw('SUM(total / 1000000) as "total"'))
            ->where('created_at', '>=', now()->firstOfMonth())
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();
        $data['date'] = $order->pluck('date')->toArray();
        $data['order'] = $order->pluck('order')->toArray();
        $data['total'] = $order->pluck('total')->toArray();

        return json_encode($data);
    }

    public function statisticOrderAjax(Request $request)
    {
        $order = Order::select(DB::raw('Date(created_at) as date'), DB::raw('COUNT(total) as "order"'), DB::raw('SUM(total) as "total"'))
            ->whereBetween('created_at', [$request->startDay, $request->endDay])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();
        $data['date'] = $order->pluck('date')->toArray();
        $data['order'] = $order->pluck('order')->toArray();
        $data['total'] = $order->pluck('total')->toArray();

        return json_encode($data);
    }

    public function statisticUser()
    {
        $users = User::select(DB::raw('Date(created_at) as date'), DB::raw('COUNT(*) as "user"'))
            ->where('created_at', '>=', now()->firstOfMonth())
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();
        
        $data['date'] = $users->pluck('date')->toArray();
        $data['user'] = $users->pluck('user')->toArray();

        return json_encode($data);
    }

    public function statisticUserAjax(Request $request)
    {
        $users = User::select(DB::raw('Date(created_at) as date'), DB::raw('COUNT(*) as "user"'))
            ->whereBetween('created_at', [$request->startDay, $request->endDay])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();
        
        $data['date'] = $users->pluck('date')->toArray();
        $data['user'] = $users->pluck('user')->toArray();

        return json_encode($data);
    }
}
