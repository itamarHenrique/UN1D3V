<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateTeamRequest extends FormRequest
{
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
            "name" => ["sometimes", "string", "max:30", "min:3"],
            "foundation_date" => "sometimes|string",
            "players.*.name" => "sometimes|string|min:3|max:30",
            "players.*.position" => "sometimes|string",
        ];
    }
}
