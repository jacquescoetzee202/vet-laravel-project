<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class AnimalSecureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()['role'] === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required", "string", "max:100"],
            "type" => ["required", "string", "max:100"],
            "date_of_birth" => ["required", "date"],
            "weight" => ["required", "numeric"],
            "height" => ["required", "numeric"],
            "biteyness" => ["required", "digits_between:1,5"],
            "treatments.*" => ["string", "max:30"],
        ];
    }
}
