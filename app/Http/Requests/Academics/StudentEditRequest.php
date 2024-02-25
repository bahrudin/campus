<?php

namespace App\Http\Requests\Academics;

use Illuminate\Foundation\Http\FormRequest;

class StudentEditRequest extends FormRequest
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
            'nik' => 'required|numeric|unique:academic_students,nik,' . $this->id,
            'name' => 'required|string',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'address' => 'nullable|string',
            'addMore' => 'nullable|array',
            'addMore.*.lesson' => 'exists:academic_lessons,id',
            'uploadDoc' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1800,max_height=1800'
//            'lessons.*' => 'exists:academic_lessons,id'
        ];
    }

    public function messages()
    {
        return [
            'nik.required' => 'Nik harus di isi',
            'nik.unique' => 'Nik harus unik/ tidak duplicate',
            'nik.numeric' => 'Nik harus numeric',
            'gender.required' => 'Jenis Kelamin harus dipilih',
            'addMore.required' => 'Matakuliah harus di isi',
        ];
    }

    public function validate(array $rules, ...$params): array
    {
        parent::validate($rules, $params); // TODO: Change the autogenerated stub
    }
}
