<?php

namespace App\Http\Requests\Admin\Product;

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
            'article' => ['required',
            Rule::unique('products')
                ->when($this->product, function ($r) {
                    $r->ignore($this->product->id);
                })
        ],            
            'title' => 'required',
            'description' => 'sometimes',
            'product_info' => 'sometimes',
            'price' => ['required', 'numeric', 'min:0'], //больше нуля
            'discount' => ['sometimes', 'numeric', 'min:0', 'max:100'],
            'size' => ['required', 'numeric', 'min:1'] //больше нуля
            'category_id' => 'required',
            'collection_id' => 'required',
            // 'picture' => ['required', 'file'],
            'picture' => [Rule::requiredIf(!$this->product->picture|| $this->removeImage), 'file'],
            'removeImage' => 'sometimes',
            // 'is_new' => 'boolean',
            'is_best_selling' => 'boolean',
            // 'is_active' => 'boolean',
            'height' => ['sometimes', 'numeric'],
            'width' => ['sometimes', 'numeric'],
            'depth' => ['sometimes', 'numeric'],
            'material' => 'sometimes',
            'material_filling' => 'sometimes',
            'age_from' => 'sometimes',
            'care_recommend' => 'sometimes',
            /* 'path' => ['sometimes', 'file'],
            'preview_path' => ['sometimes', 'file'], */
        ];
    }

    public function messages(): array
    {
        return [
            'article.required' => 'Поле "Артикул" обязательно',
            'article.unique' => 'Поле "Артикул" должно быть уникально, запись с таким уже существует',
            'price.min' => 'Поле "Цена" должно быть больше нуля',
            'size.min' => 'Поле "Размер" должно быть больше нуля',
            'discount.max' => 'Поле "Скидка" должно быть меньше 100%',


            'body.required' => 'A message is required',
        ];
    }
}
