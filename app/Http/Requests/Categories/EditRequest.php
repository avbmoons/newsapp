<?php

declare (strict_types=1);

namespace App\Http\Requests\Categories;

use App\Enums\CategoryStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class EditRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:191'],
            'slug' => ['required', 'string', 'min:3', 'max:191'],
            'description' => ['nullable', 'string'],
            'status' => ['required', new Enum(CategoryStatus::class)],
            'image' => ['sometimes'],
        ];
    }

    public function attributes(): array{
        return [
            'title' => 'Заголовок',
            'author' => 'Автор',
            'description' => 'Описание',
            'image' => 'Изображение',
            'source_id' => 'Источник',
            'status' => 'Статус',
        ];
    }

    public function messages(): array{
        return [
            'required' => 'Надо заполнить поле :attribute',
        ];
    }
}
