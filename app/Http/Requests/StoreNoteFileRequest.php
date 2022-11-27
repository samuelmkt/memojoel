<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteFileRequest extends FormRequest
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
            'note' => 'required',
            'ecu'  => 'required'
        ];
    }

    public function getNoteFilePayloads()
    {
        if ($this->hasFile('note')) {
            $url = $this->file('note')->store('notes', 'public');
            $this->merge(['url' => $url]);
        }
        return $this->toArray();
    }
}
