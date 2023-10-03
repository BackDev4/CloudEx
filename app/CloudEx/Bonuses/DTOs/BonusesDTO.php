<?php

namespace App\CloudEx\Bonuses\DTOs;

class BonusesDTO
{
    public $id;
    public $bonus;
    public $user_id;
    private $properties = [
        'id',
        'bonus',
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
