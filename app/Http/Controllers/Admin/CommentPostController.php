<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\CommentPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = CommentPost::with('user', 'post')
            ->orderBy('created_at')
            ->get();
        
        return view('admin.comment_post.index', compact('comments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = CommentPost::where('id', $id)->firstOrFail();
        $comment->delete();
        Session::flash('success', __('admin.delete_success_message'));

        return redirect()->route('comment-post.index');
    }
}
