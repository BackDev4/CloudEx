<?php

namespace App\CloudEx\UserPower\DTOs;

class UserPowerDTO
{

    public $id;
    public $total_power;
    public $unused_power;
    public $active_plan;
    public $user_id;
    private $properties = [
        'total_power',
        'unused_power',
        'active_plan',
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
