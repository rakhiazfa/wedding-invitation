<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email_or_username' => ['required', 'without_spaces'],
            'password' => ['required'],
        ];
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @return array
     */
    public function getCredentials()
    {
        $emailOrUsername = $this->input('email_or_username');
        $password = $this->input('password');

        if (filter_var($emailOrUsername, FILTER_VALIDATE_EMAIL)) {
            return [
                'email' => $emailOrUsername,
                'password' => $password,
            ];
        }

        return [
            'username' => $emailOrUsername,
            'password' => $password,
        ];
    }
}
