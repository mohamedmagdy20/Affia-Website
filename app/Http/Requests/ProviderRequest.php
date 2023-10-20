<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'=>'required|string',
            'registeration_num'=>'required',
            'category_id'=>'required',
            'city_id'=>'required',
            'country_id'=>'required',
            'entity_id'=>'required',
            'lat'=>'nullable',
            'lng'=>'nullable',
            'description'=>'nullable',
            'date_open'=>'nullable',
            'date_close'=>'nullable',
            'media'=>'nullable',
            'url'=>'nullable',
            'email'=>'required|email|unique:users,email,'.$this->user,
            'phone'=>'required|unique:users,phone,'.$this->user,
            'password'=>'required|confirmed',
            'image'=>'file',
      
        ];
    }
}
