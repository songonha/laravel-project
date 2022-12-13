<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::with('productCategory')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::all();

        return view('admin.product.create', compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $images = [];
            foreach ($request->images as $image) {
                $storage = Storage::put('/public/uploads/products', $image);
                array_push($images, ['name' => $storage]);
            }

            $product = Product::create([
                'product_category_id' => $request->product_category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'quantity' => $request->quantity,
                'input_price' => $request->input_price,
                'price' => $request->price,
                'image' => json_encode($images),
            ]);

            DB::commit();
            Session::flash('success', __('admin.add_success_message'));

            return redirect()->route('products.index');
        } catch (\Exception $ex) {
            DB::rollback();
            Session::flash('error', __('admin.add_fail_message'));

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('productCategory')
            ->where('id', $id)
            ->firstOrFail();

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        $productCategories = ProductCategory::all();

        return view('admin.product.edit', compact('product', 'productCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            if ($request->images) {
                $product = Product::where('id', $id)->firstOrFail();
                foreach (json_decode($product->image, true) as $image) {
                    Storage::delete($image['name']);
                }
                $images = [];
                foreach ($request->images as $image) {
                    $storage = Storage::put('/public/uploads/products', $image);
                    array_push($images, ['name' => $storage]);
                }
                $product = Product::updateOrCreate(
                    [
                        'id' => $id,
                    ],
                    [
                        'product_category_id' => $request->product_category_id,
                        'name' => $request->name,
                        'slug' => Str::slug($request->name),
                        'description' => $request->description,
                        'quantity' => $request->quantity,
                        'input_price' => $request->input_price,
                        'price' => $request->price,
                        'image' => json_encode($images),
                    ]
                );
            } else {
                $product = Product::updateOrCreate(
                    [
                        'id' => $id,
                    ],
                    [
                        'product_category_id' => $request->product_category_id,
                        'name' => $request->name,
                        'slug' => Str::slug($request->name),
                        'description' => $request->description,
                        'quantity' => $request->quantity,
                        'input_price' => $request->input_price,
                        'price' => $request->price,
                    ]
                );
            }

            DB::commit();
            Session::flash('success', __('admin.edit_success_message'));

            return redirect()->route('products.index');
        } catch (\Exception $ex) {
            dump($ex);exit();
            DB::rollback();
            Session::flash('error', __('admin.update_fail_message'));

            return redirect()->back();
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
        try {
            DB::beginTransaction();
            $product = Product::where('id', $id)->firstOrFail();
            foreach (json_decode($product->image, true) as $image) {
                Storage::delete($image['name']);
            }
            $product->delete();
            DB::commit();
            Session::flash('success', __('admin.delete_success_message'));

            return redirect()->route('products.index');
        } catch (\Exception $ex) {
            DB::rollback();
            Session::flash('error', __('admin.delete_fail_message'));

            return redirect()->back();
        }
    }

    public function getList()
    {
        $products = DB::table('order_details')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->select('products.id', 'products.name', 'products.price', DB::raw('SUM(order_details.quantity) as "order"'))
            ->groupBy('products.id', 'products.name', 'products.price')
            ->orderBy('products.id', 'ASC')
            ->get();

        return view('admin.product.get_list', compact('products'));
    }
}
