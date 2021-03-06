<?php

namespace App\Http\Requests;

use App\Models\Location;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('location_edit');
    }

    public function rules()
    {
        return [
            'location_code' => [
                'string',
                'required',
                'unique:locations,location_code,' . request()->route('location')->id,
            ],
            'location_name' => [
                'string',
                'required',
            ],
            'street_address' => [
                'string',
                'required',
            ],
            'city' => [
                'required',
            ],
            'state' => [
                'required',
            ],
            'country' => [
                'string',
                'required',
            ],
            'zip_code' => [
                'string',
                'required',
            ],
            'active' => [
                'required',
            ],
            'latitude' => [
                'string',
                'nullable',
            ],
            'longitude' => [
                'string',
                'nullable',
            ],
            'company_id' => [
                'required',
                'integer',
            ],
            'square_foot' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'call_in_numbers' => [
                'string',
                'nullable',
            ],
        ];
    }
}
