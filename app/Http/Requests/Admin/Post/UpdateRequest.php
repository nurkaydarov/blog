<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|image',
            'main_image' => 'nullable|image',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {

        return [
            'title.required' => 'Заголовок должен быть заполнен',
            'title.string' => 'Заголовок должен быть строкой',
            'content.required' => 'Контент должен быть заполнен',
            'content.string' => 'Контент должен быть строкой',
            'preview_image.required' => 'Вы забыли добавить изображение',
            'preview_image.image' => 'Не поддерживаемый формат изображения',
            'main_image.required' => 'Вы забыли добавить изображение',
            'main_image.image' => 'Не поддерживаемый формат изображения',
            'category_id.required' => 'Необходимо добавить категорию',
            'category_id.integer' => 'Не верный идентификатор категорий',
            'tag_ids.array' => 'Необходимо отправить массив данных',

        ];
    }
}
