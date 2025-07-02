<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\admin\AdminController;
use App\Http\Controllers\Admin\accounts\AccountsController;
use App\Http\Controllers\Admin\settings\SettingsController;
use App\Http\Controllers\FeaturesController;

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
Route::get('/features',[FeaturesController::class, 'features'])->name('features');

// Admin Routes
Route::group(['middleware' => ['auth', 'ifAdmin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


    //Account Routes
    Route::prefix('accounts')->name('admin.accounts.')->group(function () {
        Route::get('/', [AccountsController::class, 'accounts'])->name('index');
        Route::get('/editProfile', [AccountsController::class, 'editAccounts'])->name('editProfile');
        Route::put('/{id}/edit', [AccountsController::class, 'updateAccounts'])->name('profile.edit');
    });


    //Settings Route
    Route::prefix('settings')->name('admin.settings.')->group(function(){
        Route::get('/', [SettingsController::class, 'viewSettings'])->name('view');
    });
});
