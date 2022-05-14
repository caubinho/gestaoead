<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreUpdate extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'min:3', 'max:255', "unique:users"],
            'password' => 'required|min:8|max:16|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        if($this->method() === 'PUT'){
            $rules['password'] = ['nullable', 'string', 'min:8', 'max:16'];
            $rules['email'] = ['nullable', 'string', 'email', 'min:3', 'max:255', "unique:users,email,{$this->id},id"];
        }

        return $rules;
    }
}
