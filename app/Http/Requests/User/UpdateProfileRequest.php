<?php

namespace App\Http\Requests\User;

use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => ['bail', 'required', 'string', 'max:255'],
            'dateOfBirth' => ['bail', 'required', 'date'],
            'gender' => ['required'],
            'address' => ['bail', 'required', 'string', 'max:255'],
            'phone' => ['bail', 'required', 'string', 'min:10', 'max:20'],
            'email' => ['bail', 'required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
        ];
    }
}
