<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required|string',
            'password'=>'required|string',
            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'Gender'=>'required',
            'phone_no'=>'required|string',
            'address'=>'required|string',
            'role_id'=>'required|string',
            'Nationality'=>'required',
        ];
    }

}
