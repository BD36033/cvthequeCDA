<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CvthequeController,
    CompetenceController,
    MetierController,
    ProfessionnelController
};

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
// Route::get('/', function () {
//     return view('accueilVue');
// });


Route::get('/', [CvthequeController::class, 'index'])->name('accueil');
Route::resource('competences', CompetenceController::class);
Route::get('/competences/{competence}/delete', [CompetenceController::class, 'confirmDelete'])
    ->name('competences.confirm-delete');
Route::resource('metiers', MetierController::class);
Route::get('/metiers/{metier}/delete', [MetierController::class, 'confirmDelete'])
    ->name('metiers.confirm-delete');
Route::resource('professionnels', ProfessionnelController::class);
Route::get('/professionnels/{professionnel}/delete', [ProfessionnelController::class, 'confirmDelete'])
    ->name('professionnels.confirm-delete');
