<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FundingController;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
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
 

    //assets last id
    //Route::get('/assets/last-id', [AssetController::class, 'getLastAssetId']); 
    Route::middleware(['check.referrer:add_assets'])->group(function () {
        Route::get('/assets/last-id', [AssetController::class, 'getLastAssetId']);//para dli ma diretso ug access sa browser test pani
    });

    // List of assets
    Route::middleware(['check.referrer:list_of_assets'])->group(function () {
        Route::get('/api/assets', [AssetController::class, 'getAssets']);//para dli ma diretso ug access sa browser test pani
    });
    //Route::get('/api/assets', [AssetController::class, 'getAssets']);
    Route::get('/list_of_assets', [AssetController::class, 'list_of_assets'])->name('list_of_assets');
    Route::get('/assets/detail/{asset}', [AssetController::class, 'asset_details'])->name('asset_details');
    Route::get('/api/asset_details/{asset}', [AssetController::class, 'api_asset_details'])->name('api_asset_details');

    //add site on add assets
    Route::get('/sites/create', [SiteController::class, 'create'])->name('sites.create');
    Route::post('/sites', [SiteController::class, 'store'])->name('sites.store');
    //load sites via api
    Route::get('/api/sites', [SiteController::class, 'getSites']);

    //add location on add assets
    Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
    Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
    //load locations via api
    Route::get('/api/locations', [LocationController::class, 'getLocations']);

    //add department on add assets
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    //load departments via api
    Route::get('/api/departments', [DepartmentController::class, 'getDepartments']);

    //add category on add assets
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    //load categories via api
    Route::get('/api/categories', [CategoryController::class, 'getCategories']);
    
    //add funding on add assets
    Route::get('/fundings/create', [FundingController::class, 'create'])->name('fundings.create');
    Route::post('/fundings', [FundingController::class, 'store'])->name('fundings.store');
    //load fundings via api
    Route::get('/api/fundings', [FundingController::class, 'getFundings']);

    Route::get('qrcode', function () {
        $qrCodeValue = QrCode::size(300)->generate('1');
        return view('partials.qrcode', compact('qrCodeValue'));
    });
});



