<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\About\UpdateAboutRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::firstOrFail();

        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::where('id', $id)->firstOrFail();

        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutRequest $request, $id)
    {
        try {
            $about = About::where('id', $id)->firstOrFail();
            $about->update(
                [
                    'title' => $request->title,
                    'content' => $request->content,
                ]
            );
            Session::flash('success', __('admin.edit_success_message'));

            return redirect()->route('abouts.index');
        } catch (\Exception $ex) {
            Session::flash('error', __('admin.edit_fail_message'));

            return redirect()->back();
        }
    }
}
