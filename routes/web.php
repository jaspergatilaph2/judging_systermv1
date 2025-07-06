<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\admin\AdminController;
use App\Http\Controllers\Admin\accounts\AccountsController;
use App\Http\Controllers\Admin\settings\SettingsController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\criteria\CriteriaController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\LiveVoteController;
use App\Http\Controllers\Admin\judges\JudgesController;
use App\Http\Controllers\Admin\events\EventsController;

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

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Features Route
Route::get('/features', [FeaturesController::class, 'features'])->name('features');
//About Route
Route::get('/about', [AboutController::class, 'about'])->name('about');
// Support Route
Route::get('/support', [SupportController::class, 'support'])->name('support');
// Live Vote Route
Route::get('/live-vote', [LiveVoteController::class, 'vote'])->name('vote');

// Admin Routes
Route::group(['middleware' => ['auth:web', 'ifAdmin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


    //Account Routes
    Route::prefix('accounts')->name('admin.accounts.')->group(function () {
        Route::get('/', [AccountsController::class, 'accounts'])->name('index');
        Route::get('/editProfile', [AccountsController::class, 'editAccounts'])->name('editProfile');
        Route::put('/{id}/edit', [AccountsController::class, 'updateAccounts'])->name('profile.edit');
    });


    //Settings Route
    Route::prefix('settings')->name('admin.settings.')->group(function () {
        Route::get('/', [SettingsController::class, 'viewSettings'])->name('view');
    });


    // Judges Routes
    Route::prefix('judges')->name('admin.judges.')->group(function () {
        Route::get('/', [JudgesController::class, 'create'])->name('create');
        Route::post('/store', [JudgesController::class, 'store'])->name('store');
        Route::get('/view', [JudgesController::class, 'viewJudges'])->name('viewjudges');
        Route::get('/edit/{judges}', [JudgesController::class, 'edit'])->name('edit');
        Route::delete('/{judges}/delete', [JudgesController::class, 'destroy'])->name('destroy');
        Route::put('/{judges}/update', [JudgesController::class, 'update'])->name('update');
    });

    // Events Routes
    Route::prefix('/events')->name('admin.events.')->group(function () {
        Route::get('/', [EventsController::class, 'ViewEvents'])->name('events');
        Route::post('/store', [EventsController::class, 'store'])->name('store');
        Route::get('/view', [EventsController::class, 'view'])->name('view');
        Route::put('/view/{event}/update', [EventsController::class, 'update'])->name('update');
        Route::delete('/view/{event}/delete', [EventsController::class, 'destroy'])->name('destroy');
    });

    // Criteria Routes
    Route::prefix('criteria')->name('admin.criteria.')->group(function(){
        Route::get('/', [CriteriaController::class,'index'])->name('index');
        Route::post('/store', [CriteriaController::class, 'store'])->name('store');
    });
});


// Jugdes Routes
Route::group(['middleware' => ['auth:judges', 'Ifjudges'], 'prefix' => 'judges'] ,function(){
    Route::get('/dashboard', [JudgesController::class, 'dashboard'])->name('judges.dashboard');
});