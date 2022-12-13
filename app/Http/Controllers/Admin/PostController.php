<?php

namespace App\Http\Controllers\Admin;

use Str;
use Session;
use Storage;
use App\Models\Tag;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('postCategory', 'user', 'tags')
            ->orderBy('created_at', 'DESC')
            ->get();
        
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postCategories = PostCategory::all();
        $tags = Tag::all();

        return view('admin.post.create', compact('postCategories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        try {
            DB::beginTransaction();
            $storage = Storage::put('/public/uploads/posts', $request->image);
            $product = Post::create([
                'post_category_id' => $request->post_category_id,
                'user_id' => 1,
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'image' => $storage,
            ]);
            if ($request->tags) {
                $product->tags()->attach($request->tags);
            }
            DB::commit();
            Session::flash('success', __('admin.add_success_message'));

            return redirect()->route('posts.index');
        } catch (\Exception $ex) {
            DB::rollback();
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
        $postCategories = PostCategory::all();
        $tags = Tag::all();
        $post = Post::where('id', $id)->firstOrFail();

        return view('admin.post.edit', compact('postCategories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $post = Post::where('id', $id)->firstOrFail();
            if ($request->image) {
                $storage = Storage::put('/public/uploads/posts', $request->image);
                Storage::delete($post->image);
            }
            $post = Post::updateOrCreate(
                [
                    'id' => $id,
                ],
                [
                    'post_category_id' => $request->post_category_id,
                    'user_id' => 1,
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'content' => $request->content,
                    'image' => isset($storage) ? $storage : $post->image,
                ]
            );
            if ($request->tags) {
                $post->tags()->sync($request->tags);
            }
            DB::commit();
            Session::flash('success', __('admin.edit_success_message'));

            return redirect()->route('posts.index');
        } catch (\Exception $ex) {
            DB::rollback();
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
        try {
            DB::beginTransaction();
            $post = Post::where('id', $id)->firstOrFail();
            Storage::delete($post->image);
            $post->tags()->detach();
            $post->delete();
            DB::commit();
            Session::flash('success', __('admin.delete_success_message'));

            return redirect()->route('posts.index');
        } catch (\Exception $ex) {
            DB::rollback();
            Session::flash('error', __('admin.delete_fail_message'));

            return redirect()->back();
        }
    }
}
