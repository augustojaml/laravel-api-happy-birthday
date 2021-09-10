<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SessionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'                => 'required|email',
            'password'             => 'required|min:4|max:8',
        ];
    }

    public function messages()
    {
        return [
            'email.required'                    => 'O :attribute é obrigatório',
            'email.email'                        => 'O :attribute não é válido',
            'password.required'                 => 'A :attribute é obrigatória',
            'password.min'                      => 'A :attribute deve ser preenchido com no mínino 4 caracteres',
            'password.max'                      => 'A :attribute deve ser preenchido com no mínino 8 caracteres',
        ];
    }

    public function attributes()
    {
        return [
            'email'                 => 'E-mail',
            'password'              => 'Senha',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'errors' => $errors
        ], 401));
    }
}
