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
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\DisposeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\WarrantyController;


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

    Route::get('/settings', [LoginController::class, 'sessionView'])->name('settings');
    Route::post('settings/update', [LoginController::class, 'updateSession'])->name('settings.update')->middleware('auth');
    //Route::get('session', [ApiUserController::class, 'sessionView'])->name('pages.session.data');
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //ASSETS
    
    Route::get('/add_assets', [AssetController::class, 'add_asset'])->name('add_assets');

    //Route::get('/data_assets/{asset}', [AssetController::class, 'show'])->name('data_assets.show');
    //Route::get('/data_assets/{asset}/edit', [AssetController::class, 'edit'])->name('data_assets.edit');
    //Route::post('/data_assets/{asset}', [AssetController::class, 'update'])->name('data_assets.update');
    //Route::delete('/data_assets/{asset}', [AssetController::class, 'destroy'])->name('data_assets.destroy');
    Route::post('/assets/{asset}', [AssetController::class, 'update'])->name('assets.update');

    //check refer to specific which url allows on that url only
    // Route::middleware(['check.referrer:add_assets'])->group(function () {
        //para dli ma diretso ug access sa browser test pani

        Route::get('/data_assets/create', [AssetController::class, 'create'])->name('data_assets.create');
        Route::post('/data-assets', [AssetController::class, 'store'])->name('data_assets.store');

        Route::get('/assets/last-id', [AssetController::class, 'getLastAssetId']);

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
    // });

    // List of assets
    //Route::middleware(['check.referrer:list_of_assets'])->group(function () {
        Route::get('/api/assets/{status?}', [AssetController::class, 'getAssets']);
        Route::get('/api/assets_dispose', [AssetController::class, 'getAssets2']);//para dli ma diretso ug access sa browser test pani
    //});


    Route::get('/list_of_assets', [AssetController::class, 'list_of_assets'])->name('list_of_assets');
    Route::get('/assets/detail/{asset}', [AssetController::class, 'asset_details'])->name('asset_details');
    Route::get('/assets/edit/{asset}', [AssetController::class, 'edit_asset_details'])->name('edit_asset_details');

   
    Route::get('/api/asset_details/{asset}', [AssetController::class, 'api_asset_details'])->name('api_asset_details');


    Route::get('/check_in', [AssetController::class, 'check_in'])->name('check_in');

    // Checkout
    Route::get('/check_out', [AssetController::class, 'check_out'])->name('check_out');
    Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::post('/checkout/multiple-store', [CheckoutController::class, 'store_multiple'])->name('checkout.multiple.store');

    Route::post('/repair/store', [RepairController::class, 'store'])->name('checkout.store');
    Route::post('/repair/multiple-store', [RepairController::class, 'store_multiple'])->name('repair.multiple.store');

    Route::post('/dispose/store', [DisposeController::class, 'store'])->name('dispose.store');
    Route::post('dispose/multiple-store', [DisposeController::class, 'store_multiple'])->name('dispose.multiple.store');

    Route::get('/dispose', [AssetController::class, 'dispose'])->name('dispose');

    Route::post('/sell/store', [SellController::class, 'store'])->name('sell.store');
    Route::post('sell/multiple-store', [SellController::class, 'store_multiple'])->name('sell.multiple.store');

    Route::post('/upload-document', [DocumentController::class, 'store'])->name('upload.document');
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/get', [DocumentController::class, 'getDocuments'])->name('documents.get');
    Route::get('/documents/get2/{id}', [DocumentController::class, 'getDocuments2'])->name('documents.get2');
    Route::post('/documents', [DocumentController::class, 'store'])->name('upload.document');
    Route::get('/documents/download/{id}', [DocumentController::class, 'download'])->name('documents.download');
    Route::delete('/documents/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    Route::post('/test-upload', function(Request $request) {
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $path = $file->store('uploads');
            return response()->json(['success' => true, 'path' => $path]);
        }
    
        return response()->json(['success' => false, 'message' => 'No file uploaded.']);
    });
    

    Route::get('/qrcode/{qrvalue}', function ($qrvalue) {
            // Generate QR code based on the provided $qrvalue
            $qrCodeValue = QrCode::size(100)->generate($qrvalue);
        
            // Prepare data to pass to the view
            $qrtext = $qrvalue;
        
            // Return the view with the generated QR code and the QR text
            return view('partials.qrcode', compact('qrCodeValue', 'qrtext'));
    });
    
    Route::get('/printqrcode/{qrvalue}', function ($qrvalue) {
            // Generate QR code based on the provided $qrvalue
            $qrCodeValue = QrCode::size(100)->generate($qrvalue);
        
            // Return the view with the generated QR code and the QR text
            return view('partials.qrcode_print', compact('qrCodeValue'));
    });


    Route::get('/asset_events/{assetId}', [AssetController::class, 'getAssetEvents']);

    Route::post('/update_repair/{repairId}', [RepairController::class, 'updateRepair']);
    Route::get('/update_repair/{repairId}', [RepairController::class, 'updateRepair']);

    Route::post('/update_dispose/{disposeId}', [DisposeController::class, 'updateDispose']);
    Route::get('/update_dispose/{disposeId}', [DisposeController::class, 'updateDispose']);

    // Person Store
    Route::post('/person/store', [PersonController::class, 'store'])->name('person.store');
    Route::get('/api/getPerson', [PersonController::class, 'getPersons'])->name('api.getPersons');

    // Check In
    Route::post('/checkin/store', [CheckinController::class, 'store'])->name('checkin.store');
    Route::post('/checkin/multiple-store', [CheckinController::class, 'store_multiple'])->name('checkin.multiple.store');

    Route::get('/insurance', function () {
        return view('/pages/insurance');
    });

    Route::get('/insurance-data', [InsuranceController::class, 'getInsuranceData']);
    Route::delete('/insurance/{id}', [InsuranceController::class, 'detachInsurance']);
    Route::post('/link-insurance', [InsuranceController::class, 'linkInsurance']);
    Route::get('/insurances/{asset_id}', [InsuranceController::class, 'getInsurancesByAsset']);

    Route::post('/add-warranty', [WarrantyController::class, 'store'])->name('warranty.store');
    Route::get('/get-warranties/{asset_id}', [WarrantyController::class, 'getWarrantiesByAsset']);
    Route::get('/warranties/{id}', [WarrantyController::class, 'getWarranty']);
    Route::put('/warranties/{id}', [WarrantyController::class, 'updateWarranty']);
    Route::delete('/warranty/{id}', [WarrantyController::class, 'deleteWarranty'])->name('warranty.delete');
});



