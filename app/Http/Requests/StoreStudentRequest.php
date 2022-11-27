<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreStudentRequest extends FormRequest
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
        return [
            'matricule'  => 'required|string|max:255',
            'name'  	 => 'required|string|max:255',
            'email' 	 => 'required|string|email|unique:users',
            'classe'	 => 'required'
        ];
    }

    public function getStudentPayloads()
    {
        return $this->merge(['password' => Hash::make(shell_exec('pwgen -sy 13 1'))])
                    ->toArray();
    }
}
