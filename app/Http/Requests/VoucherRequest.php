<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class VoucherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                => 'required|min:10|max:150',
            'email'               => 'required|email',
            'whatsapp'            => 'required|min:15|max:15',
            'date_of_birth'       => 'required|date_format:d/m/Y',
            'how_did_you_find_us' => 'required|in:facebook,google,instagram,site,outros',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                     => 'O :attribute é obrigatório',
            'name.min'                          => 'O :attribute deve ser preenchido com no mínino 10 caracteres',
            'name.max'                          => 'O :attribute deve ser preenchido com no máximo 150 caracteres',
            'email.required'                    => 'O :attribute é obrigatório',
            'email.email'                       => 'O :attribute não é um email válido',
            'whatsapp.required'                 => 'O :attribute não é válido',
            'whatsapp.min'                      => 'O :attribute não é um válido',
            'whatsapp.max'                      => 'O :attribute não é um válido',
            'date_of_birth.required'            => 'A :attribute é obrigatória',
            'date_of_birth.date_format'         => 'A :attribute não é válida',
            'how_did_you_find_us.required'      => 'Nos informe :attribute',
            'message'                           => 'Erro'
        ];
    }

    public function attributes()
    {
        return [
            'name'                  => 'Nome',
            'email'                 => 'E-mail',
            'whatsapp'              => 'Whatsapp',
            'date_of_birth'         => 'Dt. nasc.',
            'how_did_you_find_us'   => 'Como nos conheceu?',
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
