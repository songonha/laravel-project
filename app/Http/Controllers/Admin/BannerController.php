<?php

namespace App\Http\Controllers\Admin;

use Session;
use Storage;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\UpdateBannerRequest;

class BannerController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::firstOrFail();

        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::where('id', $id)->firstOrFail();

        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, $id)
    {
        try {
            $banner = Banner::where('id', $id)->firstOrFail();
            if ($request->image) {
                $storage = Storage::put('/public/uploads/banners', $request->image);
                Storage::delete($banner->image);
            }
            $banner->update(
                [
                    'title' => $request->title,
                    'content' => $request->content,
                    'image' => isset($storage) ? $storage : $banner->image,
                ]
            );
            Session::flash('success', __('admin.edit_success_message'));

            return redirect()->route('banners.index');
        } catch (\Exception $ex) {
            Session::flash('error', __('admin.edit_fail_message'));

            return redirect()->back();
        }
    }
}
