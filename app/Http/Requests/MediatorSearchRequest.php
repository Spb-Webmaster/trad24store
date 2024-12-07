<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class MediatorSearchRequest extends FormRequest
{
    /** ok
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
            'mediator_search' => ['required', 'string' , 'min:2'],

        ];


    }

    protected function prepareForValidation()
    {
        $this->merge(
            [

                'mediator_search' => strip_tags($this->mediator_search),

            ]
        );
    }
}
