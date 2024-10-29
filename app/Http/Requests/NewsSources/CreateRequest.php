<?php

declare (strict_types=1);

namespace App\Http\Requests\NewsSources;

use App\Enums\NewsSourceStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateRequest extends FormRequest
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
        'description' => ['nullable', 'string'],
        'url' => ['required', 'string', 'min:3', 'max:191'],
        'status' => ['required', new Enum(NewsSourceStatus::class)],
        'image' => ['sometimes'],
        ];
    }

    public function attributes(): array{
        return [
            'title' => 'Название',            
            'description' => 'Описание',
            'url' => 'Ссылка',
            'image' => 'Изображение',
            'status' => 'Статус',
        ];
    }

    public function messages(): array{
        return [
            'required' => 'Надо заполнить поле :attribute',
        ];
    }
}
