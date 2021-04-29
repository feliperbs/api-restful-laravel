<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClientRequest extends FormRequest
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
            'email'=>'required|unique:clients', 'email,' . $this->id, 
            'phone'=>'required|unique:clients',  
            'date_of_birth'=>'required',  
            'zip_code'=>'required',  
            'address'=>'required',  
            'complement'=>'required',  
            'neighborhood'=>'required',  
        ];
    
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'email.required' => 'E-mail é obrigatório',
            'email.unique' => 'Já existe este email cadastrado',
            'phone.required' => 'Campo Telefone é obrigatório',
            'phone.unique' => 'Já existe este telefone cadastrado',
            'date_of_birth.required' => 'Data de Nascimento',
            'zip_code.required' => 'CEP é obrigatório',
            'address.required' => 'Endereço é obrigatório',
            'complement.required' => 'Complemento é obrigatório',
            'neighborhood.required' => 'Bairro é obrigatório',
           
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
