<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CheckOutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if(!$request->has('isLogin')) {
            return [
                'name' => ['bail', 'required', 'string', 'max:255'],
                'address' => ['bail', 'required', 'string', 'max:255'],
                'phone' => ['bail', 'required', 'string', 'max:20'],
                'email' => ['bail', 'required', 'string', 'email', 'max:255', 'unique:users'],
            ];
        } else {
            return [];
        }
    }
}
