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
use App\Http\Controllers\Judges\accounts\AccountsJudgeController;
use App\Http\Controllers\Users\participants\ParticipantsController;
use App\Http\Controllers\Users\users\UsersController;
use App\Models\Criteria;

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
    Route::prefix('criteria')->name('admin.criteria.')->group(function () {
        Route::get('/', [CriteriaController::class, 'index'])->name('index');
        Route::post('/store', [CriteriaController::class, 'store'])->name('store');
        Route::get('/view', [CriteriaController::class, 'view'])->name('view');
        Route::put('/view/{criteria}/update', [CriteriaController::class, 'update'])->name('update');
        Route::delete('/view/{criteria}/destroy', [CriteriaController::class, 'destroy'])->name('destroy');
    });

    //View the participants routes
    Route::prefix('participants')->name('admin.participants.')->group(function () {
        Route::get('/', [AdminController::class, 'view'])->name('view');
    });
});


// Jugdes Routes
Route::group(['middleware' => ['auth:judges', 'Ifjudges'], 'prefix' => 'judges'], function () {
    Route::get('/dashboard', [JudgesController::class, 'dashboard'])->name('judges.dashboard');

    //Judges Accounts
    Route::prefix('accounts')->name('judges.accounts.')->group(function () {
        Route::get('/', [AccountsJudgeController::class, 'AccountsIndex'])->name('AccountsIndex');
    });

    //Votes or to judges the performance
    Route::prefix('participants')->name('judges.participants.')->group(function () {
        Route::get('/vote', [JudgesController::class, 'vote'])->name('vote');
        Route::post('/score', [JudgesController::class, 'storeScore'])->name('storeScore');
        Route::get('/score-form', [JudgesController::class, 'showScoreForm'])->name('scoreForm');
        Route::get('/views', [JudgesController::class, 'viewScores'])->name('views');
        Route::get('/view/{scores}', [JudgesController::class, 'JudgesScores'])->name('details');
    });
});


//Contestant or Users Routes
Route::group(['middleware' => ['auth:web', 'IfUser'], 'prefix' => 'users'], function () {
    Route::get('/dashboard', [UsersController::class, 'dashboard'])->name('users.dashboard');

    // User Accounts Routes
    Route::prefix('accounts')->name('users.accounts.')->group(function () {
        Route::get('/', [UsersController::class, 'userAccounts'])->name('accounts');
        Route::get('/editProfile', [UsersController::class, 'editProfile'])->name('editProfile'); // <-- Show form
        Route::post('/{id}/update', [UsersController::class, 'updateProfile'])->name('updateProfile'); // <-- Form action

    });

    //User Participants Routes
    Route::prefix('participants')->name('users.participants.')->group(function () {
        Route::get('/', [ParticipantsController::class, 'index'])->name('participants');
        Route::post('/store', [ParticipantsController::class, 'store'])->name('store');
        Route::get('/view', [ParticipantsController::class, 'view'])->name('view');
        Route::put('/view/{participants}/update', [ParticipantsController::class, 'update'])->name('update');
        Route::delete('/view/{participants}/destroy', [ParticipantsController::class, 'destroy'])->name('destroy');
    });


    // Settings Routes
    Route::prefix('settings')->name('users.settings.')->group(function(){
        Route::get('/', [UsersController::class, 'SettingsIndex'])->name('settingsIndex');
    });
});
