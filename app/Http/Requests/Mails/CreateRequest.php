<?php

declare (strict_types=1);

namespace App\Http\Requests\Mails;

use App\Enums\MailStatus;
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
        'username' => ['required', 'string', 'min:3', 'max:255'],
        'email' => ['required', 'string', 'min:3', 'max:255'],
        'description' => ['required', 'string'],
        'status' => ['required', new Enum(MailStatus::class)],
        ];
    }

    public function attributes(): array{
        return [
            'username' => 'Ваше имя',
            'email' => 'Ваш e-mail',
            'description' => 'Ваш комментарий',
            'status' => 'Статус',
        ];
    }

    public function messages(): array{
        return [
            'required' => 'Надо заполнить поле :attribute',
        ];
    }
}
