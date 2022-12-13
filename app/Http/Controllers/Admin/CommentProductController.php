<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Http\Request;
use App\Models\CommentProduct;
use App\Http\Controllers\Controller;

class CommentProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = CommentProduct::with('user', 'product')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('admin.comment_product.index', compact('comments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = CommentProduct::where('id', $id)->firstOrFail();
        $comment->delete();
        Session::flash('success', __('admin.delete_success_message'));

        return redirect()->route('comment-product.index');
    }
}
