<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdiRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
                'id' => 'required|unique:pps_prodi,id,' . $this->prodi->id,
                'jenjang' => 'required',
                'kode' => 'required|unique:pps_prodi,kode,' . $this->prodi->id,
                'nama' => 'required',
                'keterangan' => 'required',
                'password' => 'required',
        ];
    }
}
