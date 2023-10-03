<?php

namespace App\CloudEx\Bonuses\Resources;

use App\CloudEx\Bonuses\Models\Bonuses;
use App\CloudEx\Bonuses\Requests\BonusesRequest;
use App\Http\Resources\UserResource;

class BonusesResource
{
    /**
     * Transform the resource into an array.
     *
     * @param BonusesRequest $bonusesRequest
     * @return array
     */
    public function toArray($bonusesRequest): array
    {
        /** @var Bonuses $this */
        return [
            'id' => $this->id,
            'bonus' => $this->bonus,
            'user' => UserResource::make($this->whenLoaded('user')),
        ];
    }
}
