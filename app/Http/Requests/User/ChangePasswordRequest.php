<?php

namespace App\Http\Requests\User;

use Auth;
use Hash;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
    public function rules()
    {
        return [
            'old_password' => ['bail', 'required', 'string', 'min: 8'],
            'password' => ['bail', 'required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->has('old_password') && !Hash::check($this->old_password, \Auth::user()->password)) {
                $validator->errors()->add('old_password', __('home.old_password_not_valid'));
            }
        });
    }
}
