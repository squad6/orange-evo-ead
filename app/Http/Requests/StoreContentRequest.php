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
            'title' => 'required|unique:contents|max:120',
            'description' => 'required|max:250',
            'time' => 'required',
            'type' => 'required',
            'content_by' => 'required',
            'link' => 'required',
            'subject' => 'required|max:30',
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
            'title.required' => 'O campo Título é obrigatório',
            'description.required' => 'O campo Descrição é obrigatório',
            'time.required' => 'O campo Tempo Estimado é obrigatório',
            'type.required' => 'O campo Assunto é obrigatório',
            'content_by.required' => 'O campo Conteúdo por é obrigatório',
            'link.required' => 'O campo Link é obrigatório',
            'subject.required' => 'O campo Tema é obrigatório',
            'title.unique' => 'Já existe um conteúdo com este nome',
            'title.max' => 'O título deve ter no máximo 120 caracteres',
            'description.max' => 'A descrição deve ter no máximo 250 caracteres',
            'subject.max' => 'O tema deve ter no máximo 30 caracteres',
        ];
    }
}
