<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this -> user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string','max:255'],
            'price' => ['required','string'],
            'brand_id'=>['required','exists:brands,id'],
            'image'=>['nullable','image','mimes:jpeg,png,jpg,gif','max:2048'],
            'unit_id'=>['required','exists:units,id'],
            'discount_id'=>['required','exists:discounts,id'],
            'type_id'=>['required','exists:types,id'],
            'code'=>['required','string'],
            'quantity'=>['required','numeric','min:0']
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            "errors"=>$validator->getMessageBag()
        ])->setStatusCode(400));
    }
}
