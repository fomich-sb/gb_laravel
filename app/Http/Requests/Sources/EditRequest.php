<?php

namespace App\Http\Requests\Sources;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'url' => ['required', 'string', 'min:3', 'max:200'],
            'creator_name' =>  ['nullable', 'string'],
            'creator_contacts' =>  ['nullable', 'string'],
            'comment' =>  ['nullable', 'string'],
        ];
    }
}