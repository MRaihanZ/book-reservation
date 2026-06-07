<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user')?->id;

        return [
            'name' => [
                'required',
                'max:255'
            ],

            'username' => [
                'required',
                Rule::unique('users')
                    ->ignore($userId)
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('users')
                    ->ignore($userId)
            ],

            'role' => [
                'required',
                Rule::in([
                    'librarian',
                    'user'
                ])
            ],

            'password' => [
                $userId ? 'nullable' : 'required',
                'min:8'
            ]
        ];
    }
}
