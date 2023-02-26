<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $user = $this->route('customer')->user;
        $password = $this->input('password', false);

        $rules = [
            'name' => ['required'],
            'username' => ['required', 'without_spaces', 'unique:users,username,' . $user->id],
            'email' => ['nullable', 'email', 'unique:users,email,' . $user->id],
        ];

        $password && $rules['password'] = ['required', 'min:8', 'confirmed'];

        return $rules;
    }

    protected function passedValidation()
    {
        $user = $this->route('customer')->user;
        $password = $this->input('password', false);

        $this->merge([
            'password' => $password ? Hash::make($password) : $user->password,
        ]);
    }
}
