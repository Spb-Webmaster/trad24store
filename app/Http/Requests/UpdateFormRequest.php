<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFormRequest extends FormRequest
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
            'name' => ['required', 'string' , 'min:2'],
            'username' => [ 'max:256'],
            'phone' => ['required', 'string', 'min:5',  Rule::unique('users')->ignore(auth()->user()->id)],
            'birthday' => ['date', 'nullable'],
            'id' => ['required','integer'],
        ];


    }

    protected function prepareForValidation()
    {
        $this->merge(
            [

                'phone' => phone($this->phone),
                'birthday' => birthdate2($this->birthday),

            ]
        );
    }
}
