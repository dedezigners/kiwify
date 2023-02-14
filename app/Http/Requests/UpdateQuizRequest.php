<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizRequest extends FormRequest
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
            'title' => 'string',
            'desc' => 'string',
            'status' => 'boolean',
            'questions' => 'array',
            'questions.*.question' => 'required',
            'questions.*.mandatory' => 'required|boolean',
            'questions.*.options' => 'array',
            'questions.*.options.*.option' => 'required',
            'questions.*.options.*.correct' => 'required|boolean',
        ];
    }
}
