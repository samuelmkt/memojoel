<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTpRequest extends FormRequest
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
            //
        ];
    }

    public function getTpPayloads()
    {
        if ($this->hasFile('tp')) {
            $url = $this->file('tp')->store('tps', 'public');
            $this->merge(['url' => $url]);
        }
        return $this->toArray();
    }
}
