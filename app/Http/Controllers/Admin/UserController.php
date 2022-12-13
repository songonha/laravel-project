<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')
            ->get();
        
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            User::create(
                [
                    'name' => $request->name,
                    'dateOfBirth' => $request->dateOfBirth,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $request->role,
                    'image' => $request->gender === 1 ? User::IMAGE_MALE : User::IMAGE_FEMALE,
                ]
            );
            Session::flash('success', __('admin.add_success_message'));

            return redirect()->route('products.index');
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
        $user = User::where('id', $id)->firstOrFail();

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::where('id', $id)->firstOrFail();
            $user->update(
                [
                    'name' => $request->name,
                    'dateOfBirth' => $request->dateOfBirth,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'password' => isset($request->password) ? Hash::make($request->password) : $user->password,
                    'role' => $request->role,
                    'image' => $request->gender === 1 ? User::IMAGE_MALE : User::IMAGE_FEMALE,
                ]
            );
            Session::flash('success', __('admin.edit_success_message'));

            return redirect()->route('users.index');
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
        try {
            $user = User::where('id', $id)->firstOrFail();
            $user->delete();
            Session::flash('success', __('admin.delete_success_message'));

            return redirect()->route('users.index');
        } catch (\Exception $ex) {
            Session::flash('error', __('admin.delete_fail_message'));

            return redirect()->back();
        }
    }
}
