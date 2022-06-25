<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateriModulPostRequest extends FormRequest
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
            'judul' => 'required|max:100',
            'tipe' => 'required',
            'embed_youtube' => 'nullable',
            'pdf' => 'nullable|mimes:pdf|max:20480',
        ];
    }

    public function attributes()
    {
        return [
            'judul' => 'Judul',
            'tipe' => 'Tipe',
            'embed_youtube' => 'Embed YouTube',
            'pdf' => 'PDF',
        ];
    }
}
