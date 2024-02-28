<?php

namespace App\Http\Requests\Broker;

use App\Helpers\Traits\General\HasFailedValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateBrokerRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
            'residency_number' => ['required','string','max:255'],
            'job_number' => ['required','string','max:255'],
            'phone' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255'],
            'status' => ['required','string','max:255'],
        ];
    }
}
