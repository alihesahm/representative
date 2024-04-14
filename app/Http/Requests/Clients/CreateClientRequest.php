<?php

namespace App\Http\Requests\Clients;

use App\Helpers\Traits\General\HasFailedValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
{
    use HasFailedValidationRequest;
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
            'client.name' => ['required','string','max:255'],
            'client.type' => ['required','string','max:255'],
            'client.phone' => ['required','string','max:255','unique:clients,phone'],
            'client.status' => ['required','string','max:255'],
            'location.link' => ['required','string', 'max:255'],
            'location.neighborhood' => ['required','string','max:255'],
        ];
    }
}
