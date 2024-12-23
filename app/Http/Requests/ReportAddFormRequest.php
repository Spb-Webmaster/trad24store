<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReportAddFormRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

           'sem' => ['integer', 'nullable'],
           'ugo' => ['integer', 'nullable'],
           'gra' => ['integer', 'nullable'],
           'uve' => ['integer', 'nullable'],
           'kor' => ['integer', 'nullable'],
           'tru' => ['integer', 'nullable'],
           'ban' => ['integer', 'nullable'],
           'month' => ['required', 'string'],

        ];


    }

    protected function prepareForValidation()
    {


        $this->merge(
            [

                'month' => report_month($this->month)


            ]
        );
    }
}
