<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'content' => 'required|string',
            'tags' => 'nullable|array',
            'tags.*' => 'numeric|exists:tags,id',
            'main_image' =>'required|file',
            'secondary_image' =>'required|file'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны иметь строковый тип',
            'category_id.required' => 'Это поле необходимо для заполнения',
            'category_id.integer' => 'Должно быть передано целое число',
            'category_id.exists' => 'Указанная категория не существует. Выберите другую',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Данные должны иметь строковый тип',
            'tags.*.exists' => 'Указанный тег не существует. Выберите другой',
            'main_image.required' => 'Для публикации поста необходимо прикрепить основное изображение',
            'main_image.file' => 'Изображение необходимо передать в виде файла',
            'secondary_image.required' => 'Для публикации поста необходимо прикрепить вторичное изображение',
            'secondary_image.file' => 'Изображение необходимо передать в виде файла'
        ];
    }
}
