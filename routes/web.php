<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ {
    AdController, 
    Auth\LoginController,
    Auth\ForgotPasswordController,
    UserController,
    UploadImagesController,
    AdminController
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

// init
Route::view('/', 'home')->name('home');

// Authentication Reset Routes...
Route::prefix('connexion')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});
Route::post('deconnexion', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::prefix('enregistrement')->group(function () {
    Route::get('/', [LoginController::class, 'showRegistrationForm'])->name('register');
    Route::post('/', [LoginController::class, 'register']);
});

// Password Reset Routes...
Route::prefix('passe')->group(function () {
    Route::get('change', [Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('email', [Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('change/{token}', [Auth\ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('change', [Auth\ForgotPasswordController::class, 'reset'])->name('password.update');
});

// Annonces
Route::resource('annonces', 'AdController')
    ->parameters([
        'annonces' => 'ad'
    ])->except([
        'index', 'show', 'destroy'
]);

Route::prefix('annonces')->group(function () {
    Route::get('creer', [AdController::class, 'create'])->name('annonces.create');
    Route::get('voir/{ad}', [AdController::class, 'show'])->name('annonces.show');
    Route::get('{region?}/{departement?}/{commune?}', [AdController::class, 'index'])->name('annonces.index');
    Route::post('recherche', [AdController::class, 'search'])->name('annonces.search')->middleware('ajax');
});

// Messages
Route::middleware('ajax')->group(function () {
    Route::post('message', [UserController::class, 'show'])->name('message');
    Route::post('images-save', [UploadImagesController::class, 'store'])->name('save-images');
    Route::delete('images-delete', [UploadImagesController::class, 'destroy'])->name('destroy-images');
    Route::get('images-server', [UploadImagesController::class, 'getServerImages'])->name('server-images');
});

// Administration
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    // Annonces a modérer
    Route::prefix('annonces')->group(function () {
        Route::get('/', 'AdminController@ads')->name('admin.ads');
        Route::middleware('ajax')->group(function () {
            Route::post('approve/{ad}', [AdminController::class, 'approve'])->name('admin.approve');
            Route::post('refuse', [AdminController::class, 'refuse'])->name('admin.refuse');
            Route::post('addweek/{ad}', [AdminController::class, 'addWeek'])->name('admin.addweek');
            Route::delete('destroy/{ad}', [AdminController::class, 'destroy'])->name('admin.destroy');
        });
    });

    Route::prefix('messages')->group(function () {
        Route::get('/', [AdminController::class, 'messages'])->name('admin.messages');
        Route::post('approve/{message}', [AdminController::class, 'messageApprove'])->name('admin.message.approve');
        Route::post('refuse', [AdminController::class, 'messageRefuse'])->name('admin.message.refuse');
    });

});

// Admin and user
Route::prefix('admin/annonces')->group(function () {
    Route::middleware('ajax')->group(function () {
        Route::post('addweek/{ad}', [AdminController::class, 'addWeek'])->name('admin.addweek');
        Route::delete('destroy/{ad}', [AdminController::class, 'destroy'])->name('admin.destroy');
    });
});

// Utilisateurs
Route::prefix('utilisateur')->middleware('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::prefix('annonces')->group(function () {
        Route::get('actives', [UserController::class, 'actives'])->name('user.actives');
        Route::get('obsoletes', [UserController::class, 'obsoletes'])->name('user.obsoletes');
        Route::get('attente', [UserController::class, 'attente'])->name('user.attente');
    });
    Route::prefix('profil')->group(function () {
        Route::get('email', [UserController::class, 'emailEdit'])->name('user.email.edit');
        Route::put('email', [UserController::class, 'emailUpdate'])->name('user.email.update');
        Route::get('donnees', [UserController::class, 'data'])->name('user.data');
    });
});

// Pages légales
Route::view('legal', 'legal')->name('legal');
Route::view('confidentialite', 'confidentialite')->name('confidentialite');
