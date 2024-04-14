<?php

namespace App\Http\Requests\Projects;

use App\Helpers\Traits\General\HasFailedValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateProjecteRequest extends FormRequest
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
            'project.name' => ['required','string','max:255'],
            'project.type' => ['required','string','max:255'],
            'project.contractor' => ['required','string','max:255'],
            'project.phase' => ['required','string','max:255'],
            'project.status' => ['required','string','max:255'],
            'location.link' => ['required','string', 'max:255'],
            'location.neighborhood' => ['required','string','max:255'],
        ];
    }
}
