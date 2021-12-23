<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\MedecinsController;
use App\Http\Controllers\SpecialitesController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\LienNaissanceController;
use App\Http\Controllers\HistoriquesRenvezVousController;
use App\Http\Controllers\PaiementsController;
use App\Http\Controllers\TraitementsController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\AdminController;
use App\Http\controllers\ChartDataController;
use App\Http\controllers\DisponibiliteController;


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
    return view('admin/auth/login');
});


Route::get('/Statistic/Static',[ChartDataController::class,"StaticPatient"]);


Route::get('/patient',[PatientsController::class,"index"]);
Route::get('/patient/create',[PatientsController::class,"create"]);
Route::post('/patient',[PatientsController::class,"store"]);
Route::get('/patient/{id}/edit',[PatientsController::class,"edit"]);
Route::put('/patient/{id}',[PatientsController::class,"update"]);
Route::delete('/patient/{id}',[PatientsController::class,"destroy"]);
Route::get('/patient/{id}/show',[PatientsController::class,"show"]);
Route::get('/patient/showStatic',[PatientsController::class,"showStatic"]);

Route::get('/medecin',[MedecinsController::class,"index"]);
Route::get('/medecin/action',[MedecinsController::class,"action"]);
Route::get('/medecin/create',[MedecinsController::class,"create"]);
Route::post('/medecin',[MedecinsController::class,"store"]);
Route::get('/medecin/{id}/edit',[MedecinsController::class,"edit"]);
Route::put('/medecin/{id}',[MedecinsController::class,"update"]);
Route::delete('/medecin/{id}',[MedecinsController::class,"destroy"]);
Route::get('/medecin/{id}/show',[MedecinsController::class,"show"]);

Route::get('/medecin/dispo', [DisponibiliteController::class, 'index']);

Route::post('/medecin/dispo/action', [DisponibiliteController::class, 'action']);

Route::get('/specialite',[SpecialitesController::class,"index"]);
Route::get('/specialite/create',[SpecialitesController::class,"create"]);
Route::post('/specialite',[SpecialitesController::class,"store"]);
Route::get('/specialite/{id}/edit',[SpecialitesController::class,"edit"]);
Route::put('/specialite/{id}',[SpecialitesController::class,"update"]);
Route::delete('/specialite/{id}',[SpecialitesController::class,"destroy"]);
Route::get('/specialite/{id}/show',[SpecialitesController::class,"show"]);

Route::get('/rendezV',[RendezVousController::class,"index"]);
Route::get('/rendezV/ajout',[RendezVousController::class,"create"]);
Route::post('/rendezV/store',[RendezVousController::class,"store"]);
Route::get('/rendezV/{id}/editer',[RendezVousController::class,"edit"]);
Route::put('/rendezV/{id}',[RendezVousController::class,"update"]);
Route::delete('/rendezV/{id}',[RendezVousController::class,"destroy"]);
Route::get('/rendezV/{id}/vue',[RendezVousController::class,"show"]);


Route::get('/historiqueRV',[HistoriquesRenvezVousController::class,"index"]);

Route::get('/paiement',[PaiementsController::class,"index"]);
Route::get('/paiement/ajout',[PaiementsController::class,"create"]);
Route::post('/paiement/store',[PaiementsController::class,"store"]);
Route::get('/paiement/{id}/editer',[PaiementsController::class,"edit"]);
Route::put('/paiement/{id}',[PaiementsController::class,"update"]);
Route::delete('/paiement/{id}',[PaiementsController::class,"destroy"]);
Route::get('/paiement/{id}/vue',[PaiementsController::class,"show"]);

Route::get('/traitement',[TraitementsController::class,"index"]);
Route::get('/traitement/ajout',[TraitementsController::class,"create"]);
Route::post('/traitement/store',[TraitementsController::class,"store"]);
Route::get('/traitement/{id}/editer',[TraitementsController::class,"edit"]);
Route::put('/traitement/{id}',[TraitementsController::class,"update"]);
Route::delete('/traitement/{id}',[TraitementsController::class,"destroy"]);
Route::get('/traitement/{id}/vue',[TraitementsController::class,"show"]);

Route::get('/historique',[HistoriqueController::class,"index"]);

/*

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

*/

//Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->group(function(){
            Route::get('login','AuthenticatedSessionController@create')->name('login');
            Route::post('login','AuthenticatedSessionController@store')->name('adminlogin');
    });
    Route::middleware('admin')->group(function(){
        Route::get('dashboard','HomeController@index')->name('dashboard');
    });
    Route::post('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');

});