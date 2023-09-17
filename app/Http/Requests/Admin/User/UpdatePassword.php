<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePassword extends FormRequest
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
            'is_generate_password' => ['sometimes'],
            'current_password' => [Rule::when($this->get('is_generate_password') != 'On', ['current_password:web'])],
            'password' => [Rule::when($this->get('is_generate_password') != 'On', ['confirmed'])],
        ];
    }
}
