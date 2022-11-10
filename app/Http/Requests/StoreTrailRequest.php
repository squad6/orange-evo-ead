<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrailRequest extends FormRequest
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
            'title' => 'required|unique:trails|max:80',
            'description' => 'required|max:250',
            'time' => 'required',
            'trail_by' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório',
            'title.unique' => 'Já existe uma trilha com este nome',
            'title.max' => 'O título deve ter no máximo 80 caracteres',
            'description.max' => 'A descrição deve ter no máximo 250 caracteres',
        ];
    }
}
