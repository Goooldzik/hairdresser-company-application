<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'hairdresser_id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'client_library_number' => 'required',
            'created_at' => 'nullable',
        ];
    }
}
