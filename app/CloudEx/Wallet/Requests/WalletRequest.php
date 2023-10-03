<?php

namespace App\CloudEx\Wallet\Requests;

class WalletRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'currency',
            'amount',
            'invested_power',
            'user_id' => 'required'
        ];
    }

}
