<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VaccineRegisterRequest extends FormRequest
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
            'nid' => 'required|unique:users,nid',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'name' => 'required',
            'vaccine_center_id' => 'required|exists:vaccine_centers,id',
        ];
    }
}
