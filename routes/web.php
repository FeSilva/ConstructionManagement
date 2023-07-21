<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\InterventionProcessController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\MeansurentController;
use App\Http\Controllers\ShippingListController;
use App\Http\Controllers\UploadZipController;

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
    //Dashboard Gestor
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.fiscal');

    //Companys
    Route::prefix('/company')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('companies.list');
        Route::get('/create', [CompanyController::class, 'create'])->name('companies.create');
        Route::get('/show/{id}', [CompanyController::class, 'show'])->name('companies.show');
        Route::get('/edit/{id}', [CompanyController::class, 'edit'])->name('companies.edit');
        
        Route::post('/store', [CompanyController::class, 'store'])->name('companies.store');
        Route::patch('/update/{id}', [CompanyController::class, 'update'])->name('companies.update');
        Route::delete('/destroy/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');
    });


    //Prédios
    Route::prefix('/building')->group(function () {
        Route::get('/', [BuildingController::class, 'index'])->name('buildings.list');
        Route::get('/create', [BuildingController::class, 'create'])->name('buildings.create');
        Route::get('/show/{id}', [BuildingController::class, 'show'])->name('buildings.show');
        Route::get('/edit/{id}', [BuildingController::class, 'edit'])->name('buildings.edit');
        Route::post('/getbuilding', [BuildingController::class, 'getBuilding'])->name('getBuilding');
        Route::post('/store', [BuildingController::class, 'store'])->name('buildings.store');
        Route::patch('/update/{id}', [BuildingController::class, 'update'])->name('buildings.update');
        Route::delete('/destroy/{id}', [BuildingController::class, 'destroy'])->name('buildings.destroy');
    });

      //Prédios
    Route::prefix('/contractors')->group(function () {
        Route::get('/', [ContractorController::class, 'index'])->name('contractors.list');
        Route::get('/create', [ContractorController::class, 'create'])->name('contractors.create');
        Route::get('/show/{id}', [ContractorController::class, 'show'])->name('contractors.show');
        Route::get('/edit/{id}', [ContractorController::class, 'edit'])->name('contractors.edit');
        
        Route::post('/store', [ContractorController::class, 'store'])->name('contractors.store');
        Route::patch('/update/{id}', [ContractorController::class, 'update'])->name('contractors.update');
        Route::delete('/destroy/{id}', [ContractorController::class, 'destroy'])->name('contractors.destroy');
    });

    //Prédios
    Route::prefix('/intervention-process')->group(function () {
        Route::get('/', [InterventionProcessController::class, 'index'])->name('intervention_process.list');
        Route::get('/create', [InterventionProcessController::class, 'create'])->name('intervention_process.create');
        Route::get('/show/{id}', [InterventionProcessController::class, 'show'])->name('intervention_process.show');
        Route::get('/edit/{id}', [InterventionProcessController::class, 'edit'])->name('intervention_process.edit');
        
        Route::post('/store', [InterventionProcessController::class, 'store'])->name('intervention_process.store');
        Route::patch('/update/{id}', [InterventionProcessController::class, 'update'])->name('intervention_process.update');
        Route::delete('/destroy/{id}', [InterventionProcessController::class, 'destroy'])->name('intervention_process.destroy');
    });

    //vistorias
    Route::prefix('/surveys')->group(function () {
        Route::get('/list', [SurveyController::class, 'index'])->name('surveys.list');
        Route::get('/show/{id}', [SurveyController::class, 'show'])->name('surveys.show');
        Route::get('/edit/{id}', [SurveyController::class, 'edit'])->name('surveys.edit');
        //Route::post('/store', [SurveyController::class, 'store'])->name('surveys.store');
        Route::patch('/update/{surveys_id}', [SurveyController::class, 'update'])->name('surveys.update');
        Route::delete('/destroy/{surveys_id}', [SurveyController::class, 'destroy'])->name('surveys.destroy');
        Route::get('/specific', [SurveyController::class, 'specific'])->name('surveys.specific.create');

        Route::prefix('/fs')->group(function () {
            Route::prefix('/opening')->group(function () {
                Route::get('/', [SurveyController::class, 'opening'])->name('surveys.opening.create');
                Route::post('/store', [SurveyController::class, 'store'])->name('surveys.opening.store');
                Route::post('/load/pi', [SurveyController::class, 'load_intervention'])->name('surveys.opening.load.pi');
            });

            Route::prefix('/transfer')->group(function (){
                Route::get('/', [SurveyController::class, 'transfer'])->name('surveys.transfer.create');
                Route::post('/store', [SurveyController::class, 'store'])->name('surveys.transfer.store');
            });

            Route::prefix("/oversight")->group(function () {
                Route::get('/', [SurveyController::class, 'oversight'])->name('surveys.oversight.create');
                Route::post('/store', [SurveyController::class, 'store'])->name('surveys.oversight.store');
            });
        });

        Route::prefix('/management')->group(function () {
            Route::get('/', [SurveyController::class, 'management'])->name('surveys.management.create');
            Route::post('/store', [SurveyController::class, 'store'])->name('surveys.management.store');

        });

        Route::prefix('/specific')->group(function () {
            Route::get('/', [SurveyController::class, 'specific'])->name('surveys.specific.create');
            Route::post('/store', [SurveyController::class, 'store'])->name('surveys.specific.store');
        });
        
        Route::prefix('/security')->group(function () {
            Route::get('/', [SurveyController::class, 'security'])->name('surveys.security.create');
            Route::post('/store', [SurveyController::class, 'store'])->name('surveys.security.store');
        });

        Route::prefix('/security')->group(function () {
            Route::get('/', [SurveyController::class, 'security'])->name('surveys.security.create');
            Route::post('/store', [SurveyController::class, 'store'])->name('surveys.specific.store');
        });
        
        Route::prefix('/budget')->group(function () {
            Route::get('/complexo', [SurveyController::class, 'complexo'])->name('surveys.budget.complexo.create');
            Route::get('/simple', [SurveyController::class, 'simple'])->name('surveys.budget.simple.create');
       
        });
        
    });

    //Shipping List
    Route::prefix("/shippinglist")->group(function () {
        Route::get("/", [ShippingListController::class,"index"])->name("shippinglist.index");

        //validar uso
        Route::get("/sendlist", [ShippingListController::class,"index"])->name("shippinglist.send");
        Route::post('/store', [SurveyController::class, 'store'])->name('listaenvios.consultaMes');
        Route::post("/getlist", [ShippingListController::class,"getList"])->name("shippinglist.getList");
    });

    //Prédios
    Route::prefix('/filemanager')->group(function () {
        Route::get('/', [FileManagerController::class, 'index'])->name('filemanager.index');
    });

    //Prédios
    Route::prefix('/uploadzip')->group(function () {
        Route::get('/', [UploadZipController::class, 'index'])->name('uploadzip.index');
        Route::post('/descompact', [UploadZipController::class, 'descompactZip'])->name('uploadzip.descompact');
    });

    //Usuários
    Route::prefix('/user')->group(function () {
        Route::get('/list', [UserController::class, 'index'])->name('users.list');
        Route::get('/view/account/{id}', [UserController::class, 'show'])->name('users.account');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
    });

    //Calendar
    Route::prefix('/calendar')->group(function () {
        Route::get('/', [CalendarController::class, 'index'])->name('calendar');
    });
});

