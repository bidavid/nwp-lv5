<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThesisController;
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

Route::get('/dashboard', [Controller::class, 'getDashboard'])
->middleware(['auth'])->name('dashboard');

Route::get('/edit/{id}', [UserController::class, 'getRoleEditingView'])
->middleware('auth')->name('edit.role');

Route::post('/edit/{id}', [UserController::class, 'editRoleForUser'])
->middleware('auth');

Route::get('/thesis/create', [ThesisController::class, 'getThesisCreationView'])
->middleware('auth')
->name('thesis.create');

Route::post('/thesis/create', [ThesisController::class, 'createThesis'])
->middleware('auth');


Route::post('/thesis/apply', [ThesisController::class, 'makeApplication'])
->middleware('auth')
->name('thesis.apply');

Route::get('/thesis/applications/{id}', [ThesisController::class, 'getApplicationsForThesis'])
->middleware('auth')
->name('thesis.applications');

Route::post('/thesis/acceptApplication', [ThesisController::class, 'acceptApplication'])
->middleware('auth')
->name('thesis.application.accept');

require __DIR__.'/auth.php';
