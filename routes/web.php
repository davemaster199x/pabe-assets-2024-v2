<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\SiteController;

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

Route::get('/', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login-post');

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    
    //ASSETS
    Route::get('/add_assets', [AssetController::class, 'add_asset'])->name('add_assets');
    Route::get('/data_assets/create', [AssetController::class, 'create'])->name('data_assets.create');
    Route::post('/data-assets', [AssetController::class, 'store'])->name('data_assets.store');
    Route::get('/data_assets/{asset}', [AssetController::class, 'show'])->name('data_assets.show');
    Route::get('/data_assets/{asset}/edit', [AssetController::class, 'edit'])->name('data_assets.edit');
    Route::put('/data_assets/{asset}', [AssetController::class, 'update'])->name('data_assets.update');
    Route::delete('/data_assets/{asset}', [AssetController::class, 'destroy'])->name('data_assets.destroy');

    // List of assets
    Route::get('/list_of_assets', [AssetController::class, 'list_of_assets'])->name('list_of_assets');

    //add site on add assets
    Route::get('/sites/create', [SiteController::class, 'create'])->name('sites.create');
    Route::post('/sites', [SiteController::class, 'store'])->name('sites.store');

    //load sites via api
    Route::get('/api/sites', [SiteController::class, 'getSites']);
    
});



