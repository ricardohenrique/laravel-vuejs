<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
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
            'first_name' => 'required|max:20|min:3',
            'last_name'  => 'required|max:20|min:3',
            'birth_date' => 'required|date',
            'hire_date'  => 'required|date',
            'gender'     => 'required|max:1',
            'department' => 'required',
            'title'      => 'required|max:70|min:2',
            'salary'     => 'required|integer',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'Primeiro nome é obrigatório',
            'first_name.max'      => 'Tamanho máximo excedido(20)',
            'first_name.min'      => 'Tamanho mínimo de 3 caracteres',

            'last_name.required'  => 'Primeiro nome é obrigatório',
            'last_name.max'       => 'Tamanho máximo excedido(20)',
            'last_name.min'       => 'Tamanho mínimo de 3 caracteres',

            'birth_date.required' => 'Data de nascimento é obrigatório',
            'birth_date.date'     => 'Data de nascimento deve ser uma data válida',

            'hire_date.required'  => 'Data de contratação é obrigatório',
            'hire_date.date'      => 'Data de contratação deve ser uma data válida',

            'department.required' => 'Escolha pelo menos um departamento',

            'title.required'  => 'Título é obrigatório',
            'title.max'       => 'Tamanho máximo excedido(20)',
            'title.min'       => 'Tamanho mínimo de 3 caracteres',

            'salary.required' => 'Salário é obrigatório',
            'salary.integer' => 'Salário deve ser número',
        ];
    }
}
