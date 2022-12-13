<?php

namespace App\Http\Controllers\Admin;

use Str;
use Session;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategory\PostCategoryRequest;
use App\Models\Post;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCategories = PostCategory::all();

        return view('admin.post_category.index', compact('postCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCategoryRequest $request)
    {
        try {
            PostCategory::create(
                [
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                ]
            );
            Session::flash('success', __('admin.add_success_message'));

            return redirect()->route('post-category.index');
        } catch (\Exception $ex) {
            Session::flash('error', __('admin.add_fail_message'));
            report($ex);
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
        $postCategory = PostCategory::where('id', $id)->firstOrFail();

        return view('admin.post_category.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCategoryRequest $request, $id)
    {
        try {
            PostCategory::updateOrCreate(
                [
                    'id' => $id,
                ],
                [
                    'name' => $request->name,
                    'slug' => Str::slug($request->name)
                ]
            );
            Session::flash('success', __('admin.edit_success_message'));

            return redirect()->route('post-category.index');
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
        $postCategory = PostCategory::where('id', $id)->firstOrFail();
        $postCategory->delete();
        Session::flash('success', __('admin.delete_success_message'));

        return redirect()->route('post-category.index');
    }
}
