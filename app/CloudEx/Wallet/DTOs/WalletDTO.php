<?php

namespace App\CloudEx\Wallet\DTOs;

class WalletDTO
{

    public $id;
    public $currency;
    public $amount;
    public $invested_power;
    public $user_id;
    private $properties = [
        'currency',
        'amount',
        'invested_power',
        'user_id',
    ];

    public function __construct(array $data)
    {
        foreach ($this->properties as $property) {
            $this->$property = $data[$property] ?? null;
        }
    }

    public function toArray()
    {
        $data = [];

        foreach ($this->properties as $property) {
            if (!empty($this->$property)) {
                $data[$property] = $this->$property;
            }
        }

        return $data;
    }
}
