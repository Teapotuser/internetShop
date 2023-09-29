<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriptionRequest extends FormRequest
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
            'subsribe-email' => [
                'required',
                'email',
                // Rule::when($this->get('subscription_choice') == 'subscribe', 'unique:subscriptions,email')
            ],
            'subscription_choice' => ['sometimes'],
            'agree' => [Rule::when($this->get('subscription_choice') == 'subscribe', 'required')]
        ];
    }

    public function messages(): array
    {
        return [
            'agree.required' => 'Вы не отметили поле о согласии на рассылку',
            // 'subsribe-email.unique' => 'Запись с таким e-mail уже существует',
            'subsribe-email.required' => 'Заполните поле E-mail',
            'subsribe-email.email' => 'Заполните поле E-mail корректным адресом эл. почты',
            
            'body.required' => 'A message is required',
        ];
    }
}
