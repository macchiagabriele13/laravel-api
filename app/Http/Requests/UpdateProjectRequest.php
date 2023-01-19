<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', Rule::unique('projects')->ignore($this->project->id), 'min:5', 'max:150'],
            'difficulty' => 'required',
            'languages' => 'required',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|exists:technologies,id',
            'cover_image' => 'nullable|image|max:500'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'il titolo e` richiesto',
            'title.unique' => 'il titolo deve essere univoco',
            'title.min' => 'il titolo deve contenere almeno :min caratteri',
            'title.max' => 'il titolo puo` contenere massimo :max caratteri',
            'languages.required' => 'il linguaggio e` richiesto',
            'difficulty.required' => 'la difficoltà e` richiesta',
        ];
    }
}
