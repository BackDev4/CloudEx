<?php

use App\CloudEx\Bonuses\Controllers\BonusesController;
use App\CloudEx\Deposit\Controllers\DepositsController;
use App\CloudEx\Referrals\Controllers\ReferralsController;
use App\CloudEx\UserPower\Controllers\UserPowerController;
use App\CloudEx\Wallet\Controllers\WalletController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.home');
})->name('home');
Route::get('/faq', function () {
    return view('front.faq');
})->name('faq');
Route::get('/contacts', function () {
    return view('front.contacts');
})->name('contacts');
Route::get('/terms', function () {
    return view('front.terms');
})->name('terms');
Route::get('/affiliate', function () {
    return view('front.affiliate');
})->name('affiliate');
Route::get('/about', function () {
    return view('front.about');
})->name('about');


Route::name('.dashboard.')->group(function (){
    Route::get('/deposit', [DepositsController::class, 'all'])->middleware(['auth'])->name('deposit');
    Route::post('/payment', [DepositsController::class, 'payment'])->middleware(['auth'])->name('payment');
    Route::get('/referrals', [ReferralsController::class, 'find'])->middleware(['auth'])->name('referrals');
    Route::get('/bonuses', [BonusesController::class, 'index'])->middleware(['auth'])->name('bonuses');
    Route::get('/getBonus', [BonusesController::class, 'getBonus'])->name('getbonus');
    Route::get('/telegram', function () {
        return view('front.dashboard.telegram');
    })->middleware(['auth'])->name('telegram');
});


Route::get('/dashboard', [UserPowerController::class, 'find'])->middleware(['auth'])->name('dashboard');

Route::post('/update-invested-power', [UserPowerController::class, 'updateInvestedPower'])->name('miningup');
Route::post('/updateAmount', [UserPowerController::class, 'updateAmount'])->name('updateamount');
Route::post('/decrement-invested-power', [UserPowerController::class, 'decrementInvestedPower'])->name('miningdown');
Route::post('/invest-all', [UserPowerController::class, 'all'])->name('all');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
