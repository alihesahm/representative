<?php

namespace App\Http\Requests\Visit;

use App\Helpers\Traits\General\HasFailedValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateVisitRequest extends FormRequest
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
            'purpose' => ['required','string','max:255'],
            'impression' => ['required','string','max:255'],
            'next_action' => ['required','string','max:255'],
            'project_id' => ['required','integer','exists:projects,id'],
            'client_id' => ['required','integer','exists:clients,id'],
            'client_location_id' => ['required','integer','exists:locations,id'],
            'project_location_id' => ['required','integer','exists:locations,id'],
            'link' => ['required', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
        ];
    }
}
