<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\UniqueEmailWhileUpdate;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->input('id'))
            ],
            'role_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле не может быть пустым',
            'name.string' => 'Данные должны иметь строковый тип',
            'email.required' => 'Это поле не может быть пустым',
            'email.email' => 'Email должен иметь формат mail@some.domain',
            'email.unique' => 'Пользователь с таким email-ом уже существует',
            'role.required' => 'Необходимо указать роль пользователя',
            'role.numeric' => 'Неверно введен идентефикатор роли'
        ];
    }
}
