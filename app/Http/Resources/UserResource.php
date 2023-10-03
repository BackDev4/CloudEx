<?php

namespace App\Http\Resources;

use App\CloudEx\UserPower\Models\UserPower;
use App\CloudEx\UserPower\Resources\UserPowerResource;
use App\CloudEx\Wallet\Resources\WalletResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'power_id' => UserPowerResource::make($this->whenLoaded('power')),
            'wallet_id' => WalletResource::make($this->whenLoaded('wallet')),
            'referral_link' => $this->referral_link,
        ];
    }
}
