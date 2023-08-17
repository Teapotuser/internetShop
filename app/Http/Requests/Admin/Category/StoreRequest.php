<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            // 'code' => ['required', 'unique:categories'],
            // 'code' => ['required', 'unique:categories,id,'.$this->category->id],
            //'code' => ['required', Rule::unique('categories')->ignore($this->category->id)],
            'code' => ['required',
            Rule::unique('categories')
                ->when($this->category, function ($r) {
                    $r->ignore($this->category->id);
                })
        ],            
            'name' => 'required',
            'description' => 'sometimes',
            'picture' => ['sometimes', 'file'],
            'removeImage' => 'sometimes',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Поле "Код" обязательно',
            'code.unique' => 'Поле "Код" должно быть уникально, запись с таким уже существует',

            'body.required' => 'A message is required',
        ];
    }
}
