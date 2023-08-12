<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'username'=>['string'],
            'description'=>['string', 'nullable', 'max:100'],
            'location'=>['nullable', 'max:30'],
            'website'=>['nullable', 'max:50'],
            'job'=>['nullable', 'max:20'],
        ];
    }
}
