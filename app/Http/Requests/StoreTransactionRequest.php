<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Jika pengguna adalah admin, izinkan mereka membuat transaksi untuk siapa pun.
        if ($this->user()->role === 'admin') {
            return true;
        }

        // Jika bukan admin, pengguna hanya boleh membuat transaksi untuk diri mereka sendiri.
        return $this->user()->id == $this->input('user_id');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
            'details' => 'required|array|min:1',
            'details.*.waste_data_id' => 'required|exists:waste_data,id',
            'details.*.weight' => 'required|numeric|min:0.1',
        ];
    }
}