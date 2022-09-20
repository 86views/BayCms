<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;


class UsersRequest extends FormRequest
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
         switch($this->method()) {
             case 'GET':
             case 'DELETE':
                return [];
             case 'PATCH':
                return [
                    'name' => 'required|min:3|max:50', 
                    'role_id' => 'required',
                    'is_active' => 'required',
                   'email' => 'required|email|unique:users|max:255' . Rule::unique('users')->ignore($this->users),
                    //  'email'=> 'required|string|email:rfc,dns|max:255'. Rule::unique('users')->ignore($this->id),
                    'photo_id' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    'password' => 'required',
                    //'password' => ['nullable', 'confirmed', Rules\Password::default()],
                ];
                case 'PUT':
                case 'POST':
                    return [
                        'name' => 'required|min:3|max:50', 
                        'role_id' => 'required',
                        'is_active' => 'required',
                       'email' => 'required|email|unique:users|max:255',
                        // 'email'=> 'required|string|email:rfc,dns|max:255|unique:users',
                        'photo_id' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                        'password' => 'required',
                        // 'password' => ['nullable', 'confirmed', Rules\Password::default()], 
                    ];

                    default: break;

         }
    }


      public function messages()
      {
          return [ 
       'name.required' => 'Name field is required',
       'role_id.required' => 'Role field is required',
       'is_active.required' => 'Status field is required',
       'email.required' => 'Email field is required',
       'email.email' => 'Invalid email address',
     'email.exists' => 'This email do not match our records',
       'photo_id.required' => 'User Image is required',
       'password.required' => 'Password field required',
          ];
      }
}