<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriRequest extends FormRequest
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
            'tipe_kategori' => 'required',
            'nama_kategori' => 'required',
            'deskripsi_kategori' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tipe_kategori.required' => 'Tipe kategori wajib diisi.',
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'deskripsi_kategori.required' => 'Deskripsi kategori wajib diisi.',
        ];
    }
}
