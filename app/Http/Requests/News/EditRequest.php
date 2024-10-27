<?php

declare (strict_types=1);

namespace App\Http\Requests\News;

use App\Enums\NewsStatus;
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
            //'category_ids' => ['required', 'array'],
            'category_ids.*' => ['exists:categories,id'],
            'title' => ['required', 'string', 'min:3', 'max:191'],
            'description' => ['nullable', 'string'],
            'author' => ['required', 'string', 'min:3', 'max:191'],
            'status' => ['required', new Enum(NewsStatus::class)],
            'source_id' => ['sometimes'],
            'image' => ['sometimes'],
        ];
    }

    public function getCategoryIds(): array
    {
        return (array) ($this->validated('category_ids'));
    }
}
