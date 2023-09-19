<?php

namespace App\Http\Requests\Admin\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrder extends FormRequest
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
            'name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'user_id' => ['sometimes'],
            'phone_number' => ['required'],
            'delivery_method' => ['required'],
            'address' => [Rule::requiredIf($this->get('delivery_method') == 'post')],
            'city' => [Rule::requiredIf($this->get('delivery_method') == 'post')],
            'zip_code' => [Rule::requiredIf($this->get('delivery_method') == 'post')],
            'payment_method' => ['required'],
            'status' => ['required'],
            'is_paid' => ['sometimes'],
            'track_number' => ['sometimes', 'string','nullable'],
            'payment_date' => ['sometimes', 'date','nullable'],
            'products' => ['required', 'array'],
            'quantity' => ['required', 'array']
        ];
    }


    public function messages(): array
    {
        return [
            'status.required' => 'Поле "Статус" обязательно',
            'email.required' => 'Поле "E-mail" обязательно',
            'email.email' => 'Поле "E-mail" должно соответствовать формату электронной почты',
        ];
    }
}
