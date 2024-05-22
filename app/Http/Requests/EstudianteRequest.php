<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
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
                    'codigo' => 'required|unique:estudiantes|max:70',
                    'nombres' => 'required|max:70',
                    'apellidos' => 'required|max:70',
                    'edad' => 'required|integer|min:5|max:50', 
                    'promedio' => 'required|numeric|min:0|max:20', 
                ];
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'codigo' => 'required|unique:estudiantes,codigo,'.$this->get('id').'|max:70',
                    'nombres' => 'required|max:70',
                    'apellidos' => 'required|max:70',
                    'edad' => 'required|integer|min:5|max:50',
                    'promedio' => 'required|numeric|min:0|max:20',
                ];
            }
            default:
                return [];
        }
    }
}
