<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Данные должны иметь строковый тип',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.email' => 'Email должен иметь формат mail@some.domain',
            'email.unique' => 'Пользователь с таким email-ом уже существует',
            'role.required' => 'Необходимо указать роль пользователя',
            'role.numeric' => 'Неверно введен идентефикатор роли'
        ];
    }
}
