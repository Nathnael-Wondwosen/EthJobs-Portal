<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFoundingInfoUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'industry_type' => [],
            'organization_type' => ['required', 'integer'],
            'team_size' => ['required', 'integer'],
            'establishment_date' => ['required', 'date','before_or_equal:today'],
            'website' => [],
            'email' => ['email'],
            'phone' => [],
            'city' => ['nullable', 'integer'],
            'state' => ['nullable', 'integer'],
            'city' => ['nullable', 'integer'],
            'address' => ['string', 'max:255'],
            'map_link' => ['nullable']
        ];
    }
}
