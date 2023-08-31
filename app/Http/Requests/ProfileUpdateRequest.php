<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'last_name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone_number' => ['sometimes'],
            'picture'=> ['sometimes', 'file'],
            'removeImage'=>['sometimes'],
            'address' => ['sometimes'],
            'city' => ['sometimes'],            
            'zip_code' => ['sometimes'],
            'is_subscribe' => ['sometimes'],
        ];
    }
}
