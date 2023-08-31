<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

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
            'email' => ['required', 'email',
            Rule::unique('users')
                ->when($this->user, function ($r) {
                    $r->ignore($this->user->id);
                })
        ],    
            // 'email' => ['sometimes', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],        
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => 'required',
            'address' => 'sometimes',
            'city' => 'sometimes',
            'zip_code' => 'sometimes',            
            'picture' => ['sometimes', 'file'],
            'removeImage' => 'sometimes',
            'role' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Поле "E-mail" обязательно',
            'email.unique' => 'Поле "E-mail" должно быть уникально, запись с таким уже существует',
            'email.email' => 'Поле "E-mail" должно соответствовать формату электронной почты',

            'body.required' => 'A message is required',
        ];
    }
}
