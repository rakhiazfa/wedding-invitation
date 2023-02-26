<?php

namespace App\Http\Requests\Wedding;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UpdateWeddingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    protected function prepareForValidation()
    {
        $user = $this->user();

        $this->merge([
            'customer_id' => $user->hasRole('customer') ? $user->customer->id : null,
            'date' => Carbon::createFromFormat('d/m/Y', $this->input('date'))->format('Y-m-d'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => ['required', 'numeric'],
            'name' => ['required'],
            'grooms_name' => ['required'],
            'brides_name' => ['required'],
            'date' => ['required', 'date'],
            'hall' => ['required'],
            'address' => ['required'],
        ];
    }

    protected function passedValidation()
    {
        $this->merge([
            'owner_id' => $this->input('customer_id'),
        ]);
    }
}
