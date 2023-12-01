<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReservationController;
use App\Models\Evenement;

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
    return view('welcome');
});
Route::get('/', [ClientController::class, 'afficherListe']);

Route::get('home', [HomeController::class, 'index']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});
Route::middleware('isAdmin')->group(function () {
Route::get('/association/inscription', [AssociationController::class, 'index']);
Route::post('/association/inscrip', [AssociationController::class, 'create']);
Route::get('/ajout', [EvenementController::class, 'index']);
Route::post('/ajout/evenement', [EvenementController::class, 'store']);
Route::get('/liste/evenement', [EvenementController::class, 'afficherListe']);
Route::get('/voirPlus/{id}', [EvenementController::class, 'show']);
Route::get('/modifierEven/{id}', [EvenementController::class, 'edit']);
Route::patch('/modifierEvenement/{id}', [EvenementController::class, 'update']);
Route::delete('/supprimerEvenement/{id}', [EvenementController::class, 'destroy']);
Route::patch('/decliner/{id}', [ReservationController::class, 'update']);
});
Route::middleware('auth')->group(function () {
    Route::get('/client/inscrip', [ClientController::class, 'index']);
    Route::post('/client/inscription', [ClientController::class, 'create']);
    Route::get('/liste', [EvenementController::class, 'index2']);
    Route::get('/voirPlus/{id}', [EvenementController::class, 'show']);
    Route::get('/reservation/{id}', [ReservationController::class, 'index'])->name("reservation");
    Route::post('/faireReservation/{id}', [ReservationController::class, 'create']);
    
});
require __DIR__.'/auth.php';
