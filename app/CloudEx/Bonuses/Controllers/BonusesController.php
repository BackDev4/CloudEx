<?php

namespace App\CloudEx\Bonuses\Controllers;

use App\CloudEx\Bonuses\DTOs\BonusesDTO;
use App\CloudEx\Bonuses\Models\Bonuses;
use App\CloudEx\Bonuses\Repositories\BonusesRepository;
use App\CloudEx\UserPower\Models\UserPower;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BonusesController extends Controller
{

    private BonusesRepository $repository;

    public function __construct(BonusesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $bonuses = Bonuses::all();
        return view('front.dashboard.bonuses')->with([
            'bonuses' => $bonuses,
        ]);
    }

    public function create(BonusesDTO $DTO)
    {
        $this->repository->create($DTO);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function update(BonusesDTO $DTO, $id)
    {
        $this->repository->update($DTO, $id);
    }

    public function delete($id)
    {
        $this->repository->delete($id);
    }

    public function getBonus()
    {
        $user = Auth::user();
        $user_power = UserPower::where(['user_id' => $user->id])->first();
        $power = rand(1, 5);
        DB::table('bonuses')->insert(
            ['user_id' => $user->id,
                'bonus' => $power, 'created_at' => Carbon::now()]
        );
        DB::table('user_powers')->where('id', $user->id)->updateOrInsert([
            'user_id' => $user->id,
            'total_power' => +$power,
            'unused_power' => +$power,
            'active_plan' => $user_power->active_plan,
            'updated_at' => Carbon::now()
        ]);
        session()->put('disable_button_until', now()->addHours(6));
        return redirect()->back();
    }
}
