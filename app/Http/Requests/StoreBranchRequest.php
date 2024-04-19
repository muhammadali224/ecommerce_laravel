<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'plan_name' => 'required|string',
            'base_price' => 'required|numeric',
            'charge' => 'required|numeric',
            'isFixed' => 'required|numeric',
            'fix_charg' => 'numeric',
            'fix_zone' => 'numeric',
            'max_zone' => 'required|numeric',
        ];
    }
    // public function messages(){

    // }
}
