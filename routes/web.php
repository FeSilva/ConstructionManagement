<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContractorsController;

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

// locale Route
Route::get('/', function () {
    return view('auth.login');
});

//Linguagem
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //Dashboard Fiscal
    Route::get('/', [DashboardController::class, 'fiscal'])->name('dashboard.fiscal');

    //Empreiteiras
    Route::prefix('/contractors')->group(function () {
        Route::get('/', [ContractorsController::class, 'index'])->name('contractor.list');
    });

    //Companys
    Route::prefix('/company')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('company.list');
        Route::get('/create', [CompanyController::class, 'create'])->name('company.create');
    });

    //Usuários
    Route::prefix('/user')->group(function () {
        Route::get('/list', [UserController::class, 'index'])->name('users.list');
    });

    //Calendar
    Route::prefix('/calendar')->group(function () {
        Route::get('/', [CalendarController::class, 'index'])->name('calendar');
    });
});


/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'], function () {
        return view('dashboard.index');
    })->name('dashboard');

  
    Route::prefix('/company')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('company');
        Route::get('/create', [CompanyController::class, 'create'])->name('company.create');

    });

});*/
