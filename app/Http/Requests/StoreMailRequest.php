<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|string|max:255',
            'category_id' => 'required|exists:mail_categories,id',
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:5120',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'code.required' => 'Nomor surat wajib diisi.',
            'code.string' => 'Nomor surat harus berupa teks.',
            'code.max' => 'Nomor surat tidak boleh lebih dari :max karakter.',
            'category_id.required' => 'Kategori surat wajib diisi.',
            'category_id.exists' => 'Kategori surat tidak valid.',
            'title.required' => 'Judul surat wajib diisi.',
            'title.string' => 'Judul surat harus berupa teks.',
            'title.max' => 'Judul surat tidak boleh lebih dari :max karakter.',
            'file.required' => 'File surat wajib diisi.',
            'file.file' => 'File surat harus berupa file.',
            'file.mimes' => 'File surat harus berformat PDF.',
            'file.max' => 'File surat tidak boleh lebih dari :max kilobyte.',
        ];
    }
}
