<?php

namespace App\Http\Requests\Admin\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Order;
use App\Models\OrderProducts;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status' => ['string', 'required'],
            'user_id' => ['numeric', 'sometimes'], 
            // 'email' => ['sometimes', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],        
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone_number' => 'required',
            'address' => ['string', 'sometimes'],
            'city' => ['string', 'sometimes'],
            'zip_code' => 'sometimes', 
            'track_number' => ['string', 'sometimes'],          
            'is_paid' => 'boolean',
            'payment_date' => ['date', 'sometimes'],
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Поле "Статус" обязательно',
            'email.required' => 'Поле "E-mail" обязательно',
            'email.email' => 'Поле "E-mail" должно соответствовать формату электронной почты',

            'body.required' => 'A message is required',
        ];
    }
}
