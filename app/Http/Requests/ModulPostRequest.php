<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModulPostRequest extends FormRequest
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
            'status_id' => 'required|max:100',
            'kelas_id' => 'nullable|exists:kelas,id',
            'mata_pelajaran_id' => 'nullable|exists:mata_pelajarans,id',
            'kategori_id' => 'nullable|exists:kategoris,id',
            'judul' => 'required|max:100',
            'sampul' => 'required|mimes:jpeg,jpg,png|max:2048',
        ];
    }

    public function attributes()
    {
        return [
            'status_id' => 'Status',
            'kelas_id' => 'Kelas',
            'mata_pelajaran_id' => 'Mata Pelajaran',
            'kategori_id' => 'Kategori',
            'judul' => 'Judul',
            'sampul' => 'Sampul',
        ];
    }
}
