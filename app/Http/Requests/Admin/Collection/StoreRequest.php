<?php

namespace App\Http\Requests\Admin\Collection;

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
            'code' => ['required',
            Rule::unique('collections')
                ->when($this->collection, function ($r) {
                    $r->ignore($this->collection->id);
                })
        ],            
            'name' => 'required',
            'title_description' => 'sometimes',
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
