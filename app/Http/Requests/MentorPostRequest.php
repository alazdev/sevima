<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MentorPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'email' => 'required|unique:users',
            'foto' => 'nullable|mimes:jpeg,jpg,png|max:2048',
            'profesi' => 'required|max:100',
            'deskripsi' => 'required',
        ];
    }
}
