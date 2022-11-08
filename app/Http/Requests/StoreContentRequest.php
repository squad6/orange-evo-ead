<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentRequest extends FormRequest
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
            'title' => 'required|unique:contents',
            'description' => 'required',
            'time' => 'required',
            'type' => 'required',
            'content_by' => 'required',
            'link' => 'required'
            // 'module_id' => 'required',
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
            'title.unique' => 'Já existe um conteúdo com este nome',
        ];
    }
}
