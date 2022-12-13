<?php

namespace App\Http\Controllers\Admin;

use Str;
use Session;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategory\ProductCategoryRequest;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productCategories = ProductCategory::orderBy('created_at', 'DESC')->get();

        return view('admin.product_category.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request)
    {
        try {
            ProductCategory::create(
                [
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                ]
            );
            Session::flash('success', __('admin.add_success_message'));

            return redirect()->route('product-category.index');
        } catch (\Exception $ex) {
            Session::flash('error', __('admin.add_fail_message'));

            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategory = ProductCategory::where('id', $id)->firstOrFail();

        return view('admin.product_category.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, $id)
    {
        try {
            ProductCategory::updateOrCreate(
                [
                    'id' => $id,
                ],
                [
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                ]
            );
            Session::flash('success', __('admin.edit_success_message'));

            return redirect()->route('product-category.index');
        } catch (\Exception $ex) {
            Session::flash('error', __('admin.edit_fail_message'));

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
        $productCategory = ProductCategory::where('id', $id)->firstOrFail();
        $productCategory->delete();
        Session::flash('success', __('admin.delete_success_message'));

        return redirect()->route('product-category.index');
    }
}
