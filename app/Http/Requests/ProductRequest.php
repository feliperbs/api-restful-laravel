<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',   
            'url_photo'=>'required', 
            'price'=>'required|numeric|min:2',
            'product_types_id' => 'required'
 
        ];
    
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'url_photo.required' => 'Foto do Produto é obrigatória',
            'price.required' => 'O Preço é obrigatório',    
            'price.numeric' => 'O Preço deve ser um número',  
            'product_types_id' => 'Tipo do Produto é obrigatório',  
        ];
    }

    protected function failedValidation(Validator $validator) { 
        $response = [
            'status' => false,
            'message' => $validator->errors()->first(),
            'data' => $validator->errors()
        ];
        throw new HttpResponseException(response()->json($response, 200)); 
    }

}
