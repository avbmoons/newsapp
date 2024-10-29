<?php

declare (strict_types=1);

namespace App\Http\Requests\Orders;

use App\Enums\OrderStatus;
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
        'username' => ['required', 'string', 'min:3', 'max:255'],
        'phone' => ['nullable', 'string', 'min:10', 'max:100'],
        'email' => ['required', 'string', 'min:3', 'max:255'],
        'orderinfo' => ['required', 'string'],
        'status' => ['required', new Enum(OrderStatus::class)],
        ];
    }

    public function attributes(): array{
        return [
            'username' => 'Ваше имя',
            'phone' => 'Ваш телефон',
            'email' => 'Ваш e-mail',
            'orderinfo' => 'Что выгрузить?',
            'status' => 'Статус',
        ];
    }

    public function messages(): array{
        return [
            'required' => 'Надо заполнить поле :attribute',
        ];
    }
}
