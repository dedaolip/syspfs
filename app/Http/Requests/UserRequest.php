<?php

namespace App\Http\Requests;

use App\User;
use App\Http\Requests\Request;

class UserRequest extends Request
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
     * @see https://laracasts.com/discuss/channels/requests/laravel-5-validation-request-how-to-handle-validation-on-update
     * @see https://laravel.com/docs/5.2/validation#rule-unique
     *
     * @return array
     */
    public function rules()
    {
        $user = User::find($this->users);

        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST': {
                return [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'cpf' => 'required|max:11|min:11|unique:users',
                    'office' => 'required'
                ];
            }
            case 'PUT': {
                return [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users'. $user->id,
                    'password' => 'required|min:6|confirmed',
                    'cpf' => 'required|max:11|min:11|unique:users',
                    'office' => 'required'
                ];
            }
            case 'PATCH':
                break;

            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required'     => 'O campo Nome é obrigatório.',
            'name.max'          => 'No máximo 100 caracteres é permitido para o campo Nome.',
            'email.required'    => 'O campo E-mail é obrigatório.',
            'email.max'         => 'No máximo 70 caracteres é permitido para o campo E-mail.',
            'password.required' => 'O campo Senha é obrigatório.',
        ];
    }
}
