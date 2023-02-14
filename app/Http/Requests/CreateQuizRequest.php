<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuizRequest extends FormRequest
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
            'title' => 'required|string',
            'desc' => 'required|string',
            'status' => 'required|boolean',
            'questions' => 'required|array',
            'questions.*.question' => 'required',
            'questions.*.mandatory' => 'required|boolean',
            'questions.*.options' => 'required|array|min:1',
            'questions.*.options.*.option' => 'required',
            'questions.*.options.*.correct' => 'required|boolean',
        ];
    }
}
