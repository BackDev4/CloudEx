<?php

namespace App\CloudEx\Bonuses\Repositories;

use App\CloudEx\Bonuses\DTOs\BonusesDTO;
use App\CloudEx\Bonuses\Interfaces\BonusesInterface;
use App\CloudEx\Bonuses\Models\Bonuses;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BonusesRepository implements BonusesInterface
{

    public function index()
    {
        return Bonuses::with('user')->get();
    }

    public function create(BonusesDTO $bonusesDTO)
    {
        $bonuses = new Bonuses($bonusesDTO->toArray());
        $bonuses->save();
    }

    public function find(int $id)
    {
        return Bonuses::with('user')->find($id);
    }

    public function update(BonusesDTO $bonusesDTO,$id)
    {
        $bonuses = Bonuses::findOrFail($id);
        $bonuses->fill($bonusesDTO->toArray());
        return $bonuses->save();
    }

    public function delete($id)
    {
        Bonuses::destroy($id);
    }

}
