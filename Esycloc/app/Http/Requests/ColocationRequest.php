<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //logique meiter pour la creation d'une colocation par une user
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
            'name'=> 'required|string|max:255',
            'description'=> 'required|string|max:1000',
        ];
    }
}
