<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required|same:password',

            //nullable
            'telefono' => 'nullable|string|max:15',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'nullable|string|max:100',
            'capacidad' => 'nullable|integer|min:1',
            'horarios' => 'nullable|string|max:254',
            'responsable' => 'nullable|string|max:255',
            'servicios' => 'nullable|string|max:255',

            
            'id_rol' => 'required|exists:roles,id',

        ];
    }
}
