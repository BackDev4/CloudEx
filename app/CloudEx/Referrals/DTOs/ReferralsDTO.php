<?php

namespace App\CloudEx\Referrals\DTOs;

class ReferralsDTO
{
    public $id;
    public $user_id;
    public $referral_id;
    public $level;
    private $properties = [
        'user_id',
        'referral_id',
        'level',
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
