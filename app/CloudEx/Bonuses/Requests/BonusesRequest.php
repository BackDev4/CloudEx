<?php

namespace App\CloudEx\Bonuses\Requests;

class BonusesRequest
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
            'bonus' => 'required',
            'user_id' => 'required'
        ];
    }

}
