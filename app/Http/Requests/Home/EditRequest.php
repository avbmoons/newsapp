<?php

declare (strict_types=1);

namespace App\Http\Requests\Home;

use App\Enums\SectionStatus;
use App\Enums\SectionVisible;
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
        'title' => ['required', 'string', 'min:3', 'max:255'],
        'resume' => ['nullable', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'is_visible' => ['required', new Enum(SectionVisible::class)],
        'status' => ['required', new Enum(SectionStatus::class)],
        ];
    }

    public function attributes(): array{
        return [
            'title' => 'Раздел',
            'resume' => 'Резюме',
            'description' => 'Описание',
            'image' => 'Изображение',
            'is_visible' => 'Отображение на странице',
            'status' => 'Статус',
            'image' => ['sometimes'],
        ];
    }

    public function messages(): array{
        return [
            'required' => 'Надо заполнить поле :attribute',
        ];
    }
}
