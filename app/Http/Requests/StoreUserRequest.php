<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:5|confirmed',
            // 'password_confirmation' => 'required|same:password',
            'terms_of_sevice' => 'accepted',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'terms_of_sevice.accepted' => 'You must agree to our terms and conditions'
    //     ];
    // }
}
