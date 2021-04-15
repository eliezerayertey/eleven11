<?php

namespace App\Http\Requests;

use App\Models\RandomCode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRandomCodeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('random_code_create');
    }

    public function rules()
    {
        return [
            'code'             => [
                'string',
                'required',
            ],
            'active'           => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'location_code_id' => [
                'required',
                'integer',
            ],
            'company_id'       => [
                'required',
                'integer',
            ],
        ];
    }
}
