<?php

namespace App\CloudEx\Bonuses\Interfaces;

use App\CloudEx\Bonuses\DTOs\BonusesDTO;
use App\CloudEx\Bonuses\Models\Bonuses;


interface BonusesInterface
{
    public function index();
    public function create(BonusesDTO $bonusesDTO);
    public function find(int $id);
    public function update(BonusesDTO $bonusesDTO,$id);
    public function delete($id);
}
