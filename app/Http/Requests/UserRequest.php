<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|unique:users|max:255',
                    'email' => 'required|email|unique:users|max:255',
                    'password' => 'required|min:3|max:255', 
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required|unique:users,name,'.$this->get('id').'|max:255',
                    'email' => 'required|email|unique:users,email,'.$this->get('id').'|max:255',
                    'password' => 'sometimes|min:3|max:255', 
                ];
            default:
                return [];
        }
    }
}
