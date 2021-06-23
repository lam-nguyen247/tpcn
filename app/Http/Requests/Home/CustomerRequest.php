<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'first_name' => [
                'required',
                'max:50'
            ],
            'last_name' => [
                'required',
                'max:50'
            ],
            'password' => [
                'required',
                'min:6',
                'required_with:password_confirmation',
                'same:password_confirmation'
            ],
            'password_confirmation' => [
                'min:6'
            ],
            'phone' => [
                'required'
            ],
            'email' => [
                'required',
                'email'
            ]
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => trans('validation.first_name_required'),
            'first_name.max' => trans('validation.first_name_max'),

            'last_name.required' => trans('validation.last_name_required'),
            'last_name.max' => trans('validation.last_name_max'),

            'password.required' => trans('validation.password_required'),
            'password.min' => trans('validation.password_min'),
            'password.required_with' => trans('validation.current_password'),
            'password.same' => trans('validation.current_password'),

            'password_confirmation.min' => trans('validation.password_confirmation_min'),
        ];
    }
}
