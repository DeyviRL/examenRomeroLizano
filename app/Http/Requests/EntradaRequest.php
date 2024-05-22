<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaRequest extends FormRequest
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
                    'placa' => 'required|unique:entradas|exists:vehiculos,placa',
                    'fecha' => 'required|date_format:Y-m-d H:i:s',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'placa' => 'required|exists:vehiculos,placa',
                    'fecha' => 'required|date_format:Y-m-d H:i:s',
                ];
            default:
                return [];
        }
    }
}