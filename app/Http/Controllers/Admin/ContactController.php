<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\UpdateContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::firstOrFail();

        return view('admin.contact.index', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::where('id', $id)->firstOrFail();

        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, $id)
    {
        try {
            $contact = Contact::where('id', $id)->firstOrFail();
            $contact->update(
                [
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'email' => $request->email,
                ]
            );
            Session::flash('success', __('admin.edit_success_message'));

            return redirect()->route('contacts.index');
        } catch (\Exception $ex) {
            Session::flash('error', __('admin.edit_fail_message'));

            return redirect()->back();
        }
    }
}
