<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenerateGameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::name('generate')->get('/GenerateGame/{level}', [GenerateGameController::class, 'generate']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('result_games', 'livewire.result_games.index')->middleware('auth');
	Route::view('players', 'livewire.players.index')->middleware('auth');
	Route::view('teams', 'livewire.teams.index')->middleware('auth');
    Route::view('team_against', 'livewire.team_against.index')->middleware('auth');
    Route::view('abstracts', 'livewire.abstracts.index')->middleware('auth');

    