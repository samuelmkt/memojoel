<?php

namespace App\Http\Requests;

use App\Models\StudentTp;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateStudentTpRequest extends FormRequest
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
            'tp'  => 'required',
            'tp_id' => 'required',
        ];
    }

    public function getStudentTpPayloads()
    {
        return $this->merge([
                    'date_soumission' => Carbon::now(),
                    'url'             => ($this->hasFile('tp')) ? $this->file('tp')->store('tps', 'public') : Str::remove('storage/', StudentTp::find($this->studentTp)->url) 
                ])
                ->except('tp', 'studentTp');
    }
}
