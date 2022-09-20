<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;


class UserRequest extends FormRequest
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
        
        $rules = [
            'name'=>  [
                'required',
                 'min:3',
                 'max:50', 
            ],
            'role_id'=>  [
                'required', 
            ],
            'is_active'=>  [
               'required',     
            ],
            'photo_id'=>  [
                'required',
                 'image',
                 'mimes:jpg,png,jpeg,gif,svg',
                 'max:2048', 
            ],
            'password'=>  [
                'required',     
             ],
        ];

     

    if($this->getMethod() == "POST") {
          $rules += [
              'email' => [
                'required',
                'email',
                'max:191',
                'unique:users,email',
               ],
        ];
    }   

      if($this->getMethod() == "PATCH") {
          $rules += [
            'email' => [
              'required',
              'email',
              'max:191',
               Rule::unique('users')->ignore($this->user),
             ],
      ];
    
  }   
       return  $rules;    
 
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