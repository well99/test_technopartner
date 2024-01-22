<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
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
            'id_kategori' => 'required',
            'tipe_transaksi' => 'required',
            'nominal' => 'required',
            'deskripsi' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_kategori.required' => 'Kategori wajib diisi.',
            'tipe_transaksi.required' => 'Tipe Transaksi wajib diisi.',
            'nominal.required' => 'Nominal wajib diisi.',
            'deskripsi.required' => 'Nominal wajib diisi.',
        ];
    }
}
