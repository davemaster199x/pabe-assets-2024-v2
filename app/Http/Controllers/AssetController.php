<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asset; // Make sure to import the Asset model
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

use App\Models\Status;

use App\Models\SiteModel;
use App\Models\LocationModel;
use App\Models\CategoryModel;
use App\Models\DepartmentModel;
use App\Models\FundingModel;
use App\Models\StatusModel;

use App\Models\EventDispose;
use App\Models\EventRepair;
use App\Models\EventCheckin;
use App\Models\EventCheckout;
use App\Models\EventSell;
use App\Models\AssetEvent;
use App\Models\Person;
use App\Models\CheckDetail;


//use ZipArchive;
//use SimpleSoftwareIO\QrCode\Facades\QrCode;
//use Intervention\Image\ImageManagerStatic as Image;


class AssetController extends Controller
{

    public function add_asset()
    {
        return view('pages.add_asset');
    }



    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'assets_tag_id' => 'required|string|max:150',
            'purchase_date' => 'nullable|date',
            'cost' => 'nullable|numeric',
            'purchase_from' => 'nullable|string|max:150',
            'brand' => 'nullable|string|max:150',
            'model' => 'nullable|string|max:150',
            'serial_no' => 'nullable|string|max:150',
            'site_id' => 'nullable|integer',
            'location_id' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'department_id' => 'nullable|integer',
            'asset_photo_file' => 'nullable|file|mimes:jpg,png,jpeg',
            'depreciable_asset' => 'nullable|integer',
            'depreciable_cost' => 'nullable|numeric',
            'salvage_value' => 'nullable|numeric',
            'assets_life' => 'nullable|string|max:50',
            'depreciation_method' => 'nullable|string|max:100',
            'date_acquired' => 'nullable|date',
            'funding_source' => 'nullable|string|max:100',
            'amount_debited' => 'nullable|numeric',
            'payment_mode_id' => 'nullable|string',
            'status_id' => 'nullable|integer',
            'delete' => 'nullable|string|max:1',
        ]);

        // Create a new instance of the Asset model
        $asset = new Asset();

         // Call the getLastAssetId method
         $response = $this->getLastAssetId();

         // Extract the data from the response
         $lastIdData = $response->getData();
 
         // Access the formatted ID
         $formattedId = $lastIdData->last_id;
        
        // Assign values from request to the model instance
        $asset->description = $request->description;
        $asset->assets_tag_id = $formattedId; //useless ang modification sa frontend kung ma retrive ra sa backend inig add sa assets
        $asset->purchase_date = $request->purchase_date;
        $asset->cost = $request->cost;
        $asset->purchase_from = $request->purchase_from;
        $asset->brand = $request->brand;
        $asset->model = $request->model;
        $asset->serial_no = $request->serial_no;
        $asset->site_id = $request->site_id;
        $asset->location_id = $request->location_id;
        $asset->category_id = $request->category_id;
        $asset->department_id = $request->department_id;

        // Handle file upload if asset_photo_file is present
        if ($request->hasFile('asset_photo_file')) {
            $asset->asset_photo_file = $request->file('asset_photo_file')->store('assets_photos', 'public');
        }

        $asset->depreciable_asset = $request->depreciable_asset;
        $asset->depreciable_cost = $request->depreciable_cost;
        $asset->salvage_value = $request->salvage_value;
        $asset->assets_life = $request->assets_life;
        $asset->depreciation_method = $request->depreciation_method;
        $asset->date_acquired = $request->date_acquired;
        $asset->funding_source = $request->funding_source;
        $asset->amount_debited = $request->amount_debited;
        $asset->payment_mode_id = $request->payment_mode_id;
        $asset->status_id = 1;//$request->status_id;
        $asset->delete = $request->delete ?? '0';

        // Save the asset to the database
        $asset->save();

        // Loop through the appended CheckDetail data
        if ($request->has('date_check')) {
            $lastAsset = Asset::latest('asset_id')->first();
            // Format the asset_id
            $lastId = $lastAsset ? $lastAsset->asset_id : 0;

            foreach ($request->date_check as $key => $value) {
                // Ensure that at least one field is filled for a valid CheckDetail entry
                CheckDetail::create([
                    'asset_id' => $lastId,  // Associate with the newly created asset
                    'date' => $request->date_check[$key],
                    'check_no' => $request->check_no[$key],
                    'description' => $request->description_check[$key],
                    'amount' => $request->amount[$key],
                    'due_date' => $request->due_date[$key],
                    'bank' => $request->bank[$key],
                    'status' => 'Pending',  // Default status if needed
                ]);
            }
        }

        return redirect()->route('add_assets')->with('success', 'Asset created successfully.');
    }

    public function list_of_assets()
    {
        $assets = DB::table('tbl_assets')
            ->join('tbl_status', 'tbl_assets.status_id', '=', 'tbl_status.status_id')
            ->where('tbl_assets.delete', 0)
            ->where('tbl_status.delete', 0)
            ->select('tbl_assets.*', 'tbl_status.status_name')
            ->orderBy('tbl_assets.asset_id', 'desc')
            ->paginate(10);

        return view('pages.list_of_assets', compact('assets'));
    }

    public function asset_details($asset)
    {
        $asset_idd = $asset;//Crypt::decryptString(strval($asset));
        return view('pages.asset_details', ['asset_id' => $asset_idd , 'encrypt_asset_id' => $asset ]);
    }

    public function edit_asset_details($asset)
    {
       
        $asset_idd = $asset;//Crypt::decryptString(strval($asset));
        $asset2 = Asset::where('delete','0')->findOrFail($asset_idd);
      //  print_r($asset2->site_id);
        //exit();

        $sites = SiteModel::where('site_id',$asset2->site_id)->first();
        $locations = LocationModel::where('location_id',$asset2->location_id)->first();
        $categories = CategoryModel::where('category_id',$asset2->category_id)->first();
        $departments = DepartmentModel::where('department_id',$asset2->department_id)->first();

        //    print_r($asset2->funding_source);
         //   exit();
        $fundings = FundingModel::where('funding_id',$asset2->funding_source)->first();

       // print_r($fundings);
        //exit();
        
        return view('pages.edit_asset', [
            'asset_id' => $asset_idd ,
            'data' => $asset2,
            'site_id' => $sites->site_id,
            'site_name' => $sites->site_name,
            'location_id' => $locations->location_id,
            'location_name' => $locations->location_name,
            'category_id' => $categories->category_id,
            'category_name' => $categories->category_name,
            'department_id' => $departments->department_id,
            'department_name' => $departments->department_name,
            'funding_id' => $fundings->funding_id ?? '',
            'funding_name' => $fundings->funding_name ?? ''
        ]);

    }

    //
    public function update(Request $request, Asset $asset)
    {
        
         // Directly update the asset instance without validation
    $asset->description = $request->input('description');
    //$asset->assets_tag_id = $request->input('assets_tag_id');
    $asset->purchase_date = $request->input('purchase_date');
    $asset->cost = $request->input('cost');
    $asset->purchase_from = $request->input('purchase_from');
    $asset->brand = $request->input('brand');
    $asset->model = $request->input('model');
    $asset->serial_no = $request->input('serial_no');
    $asset->site_id = $request->input('site_id');
    $asset->location_id = $request->input('location_id');
    $asset->category_id = $request->input('category_id');
    $asset->department_id = $request->input('department_id');
    $asset->depreciable_asset = $request->input('depreciable_asset');
    $asset->depreciable_cost = $request->input('depreciable_cost');
    $asset->salvage_value = $request->input('salvage_value');
    $asset->assets_life = $request->input('assets_life');
    $asset->depreciation_method = $request->input('depreciation_method');
    $asset->date_acquired = $request->input('date_acquired');
    $asset->funding_source = $request->input('funding_id');
    $asset->amount_debited = $request->input('amount_debited');
    $asset->payment_mode_id = $request->input('payment_mode_id');
   // $asset->status_id = $request->input('status_id');

    // Handle file upload if any
    if ($request->hasFile('asset_photo_file')) {
        $asset->asset_photo_file = $request->file('asset_photo_file')->store('assets_photos', 'public');
        // $file = $request->file('asset_photo_file');
        // $path = $file->store('assets_photos'); // Store the file
        // $asset->asset_photo_file = $path;
    }

    // Save the updated asset instance
    $asset->save();

        $asset2 = Asset::where('delete','0')->findOrFail($asset->asset_id);
        //  print_r($asset2->site_id);
        //exit();
        //
        
   /*     $sites = SiteModel::where('site_id',$asset2->site_id)->first();
        $locations = LocationModel::where('location_id',$asset2->location_id)->first();
        $categories = CategoryModel::where('category_id',$asset2->category_id)->first();
        $departments = DepartmentModel::where('department_id',$asset2->department_id)->first();

        //    print_r($asset2->funding_source);
         //   exit();
        $fundings = FundingModel::where('funding_id',$asset2->funding_source)->first();

       // print_r($fundings);
       // exit('ss');
        
        return view('pages.edit_asset', [
            'asset_id' => $asset->asset_id ,
            'data' => $asset2,
            'site_id' => $sites->site_id,
            'site_name' => $sites->site_name,
            'location_id' => $locations->location_id,
            'location_name' => $locations->location_name,
            'category_id' => $categories->category_id,
            'category_name' => $categories->category_name,
            'department_id' => $departments->department_id,
            'department_name' => $departments->department_name,
            'funding_id' => $fundings->funding_id ?? '',
            'funding_name' => $fundings->funding_name ?? ''
        ]);*/
     
        $asset_idd = $asset->asset_id;//Crypt::decryptString(strval($asset));
       // return route('/assets/details/'.$asset_idd , ['asset_id' => $asset_idd , 'encrypt_asset_id' => $asset->asset_id ]);
       return redirect()->to('/assets/detail/' . $asset_idd );


    }

    //

    public function api_asset_details($asset)
    {
        $asset_idd = $asset;//Crypt::decryptString(strval($asset));
        $asset2 = Asset::with(['site', 'location', 'category', 'department', 'status', 'person'])->findOrFail($asset_idd);
        return response()->json($asset2);
    }

    public function getLastAssetId()
    {
        // Get the last asset_id
        $lastAsset = Asset::latest('asset_id')->first();

        // Format the asset_id
        $lastId = $lastAsset ? $lastAsset->asset_id : 0;
        $formattedId = 'PABE-'.date('Y').'-' . ($lastId+1);

        // Return the formatted ID
        return response()->json(['last_id' => $formattedId]);
    }

    public function getAssets($status = NULL) {
            if ($status == 'checkin') {
                $assets = Asset::where('status_id', 2)
                        ->orderBy('asset_id', 'desc')
                        ->get();
            } elseif($status == 'checkout'){
                $assets = Asset::where('status_id', 1)
                        ->orderBy('asset_id', 'desc')
                        ->get();
            } else {
                $assets = Asset::orderBy('asset_id', 'desc')
                ->get();
            }
            
    
            $response = [
                "recordsTotal" => $assets->count(), // Total records without filtering
                "recordsFiltered" => $assets->count(), // Total records after filtering, if any
                "data" => []
            ];
            
            foreach ($assets as $asset) {
                $asset_idd = $asset->asset_id;//Crypt::encryptString(strval($asset->asset_id));

                $departments = DepartmentModel::where('department_id',$asset->department_id)->first();

                $status_name = Status::where('status_id', $asset->status_id)->select('status_name')->first();
                $site_name = SiteModel::where('site_id', $asset->site_id)->select('site_name')->first();
                $location_name = LocationModel::where('location_id', $asset->location_id)->select('location_name')->first();
                $person = Person::where('person_id', $asset->person_id)->select('full_name')->first();
                $assetPhotoUrl = Storage::disk('public')->exists($asset->asset_photo_file) 
                    ? asset('storage/' . $asset->asset_photo_file) 
                    : 'No Image';
                $response['data'][] = [
                    "asset_photo" => $assetPhotoUrl !== 'No Image' 
                        ? '<img src="' . $assetPhotoUrl . '" alt="' . $asset->description . '" style="width: 70px; height: auto;">' 
                        : '<img src="' . asset('images/No_Image_Available.jpg') . '" alt="' . $asset->description . '" style="width: 70px; height: auto;">',
                    "assets_tag_id" => $asset->assets_tag_id,
                    "description" => $asset->description,
                    "brand" => $asset->brand,
                    "purchase_date" => $asset->purchase_date,
                    "cost" => $asset->cost,
                    "status_id" => $status_name->status_name ?? '',
                    "view_button" => '<a href="' . route('asset_details', ['asset' => $asset_idd ]) . '" class="btn btn-outline-light" style="border-color: black; color: black;" title="View" data-bs-original-title="View" data-original-title="View"><i class="icofont icofont-eye-alt"></i> View</a>',
                    "asset_id" => $asset_idd,
                    "site_name" => $site_name->site_name ?? '',
                    "location_name" => $location_name->location_name ?? '',
                    "assigned_to" => $person->full_name ?? '',
                    "site" => $site_name->site_name ?? '',
                    "site_id" => $asset->site_id,
                    "depreciable_cost" => $asset->depreciable_cost,
                    "salvage_value" => $asset->salvage_value,
                    "department_name" => $departments->department_name

                ];
            }
            
            return response()->json($response);
    
    }

    public function getAssets2() {
        $assets = Asset::selectRaw('asset_photo_file, assets_tag_id, description, brand, purchase_date, cost, status_id, asset_id , site_id , location_id ')
        ->orderBy('asset_id', 'desc')
        ->get();

        $response = [
            "recordsTotal" => $assets->count(), // Total records without filtering
            "recordsFiltered" => $assets->count(), // Total records after filtering, if any
            "data" => []
        ];
        
        foreach ($assets as $asset) {
            $asset_idd = $asset->asset_id;//Crypt::encryptString(strval($asset->asset_id));
            $status_name = Status::where('status_id', $asset->status_id)->select('status_name')->first();

            

            $assetPhotoUrl = Storage::disk('public')->exists($asset->asset_photo_file) 
                ? asset('storage/' . $asset->asset_photo_file) 
                : 'No Image';
            $response['data'][] = [
                "asset_id" => $asset->asset_id,
                "assets_tag_id" => $asset->assets_tag_id,
                "description" => $asset->description,
                "status_id" => $status_name->status_name ?? '',
                "assigned_to" => '',
                "site_id" => $asset->site_id ?? '',
                "location_id" => $asset->location_id  ?? '',
                "lease_to" =>  ''
            ];
        }
        
        return response()->json($response);

}
    //
    

    public function check_out()
    {
        return view('pages.check_out');
    }

    public function check_in()
    {
        return view('pages.check_in');
    }

    public function dispose()
    {
        return view('pages.dispose');
    }
    
    
    public function getAssetEvents($assetId) {
        $assetEvents = AssetEvent::where('asset_id', $assetId)
        ->orderBy('created_at', 'desc')
        ->get();

        $result = [];

        foreach ($assetEvents as $event) {
            $eventID = $event->event_id;
        
            // Get repair, dispose, check-in, and check-out events
            $repairEvents = EventRepair::where('event_id', $eventID)->get();
            $disposeEvents = EventDispose::where('event_id', $eventID)->get();
            $checkinEvents = EventCheckin::where('event_id', $eventID)->get();
            $checkoutEvents = EventCheckout::where('event_id', $eventID)
                ->with('person', 'site')
                ->get();
            $sellEvents = EventSell::where('event_id', $eventID)->get();
        
            // Merge all events into a single collection
            $events = collect();
        
            if ($repairEvents->isNotEmpty()) {
                $events = $events->merge($repairEvents);
            }
        
            if ($disposeEvents->isNotEmpty()) {
                $events = $events->merge($disposeEvents);
            }
        
            if ($checkinEvents->isNotEmpty()) {
                $events = $events->merge($checkinEvents);
            }
        
            if ($checkoutEvents->isNotEmpty()) {
                $events = $events->merge($checkoutEvents);
            }

            if ($sellEvents->isNotEmpty()) {
                $events = $events->merge($sellEvents);
            }
        
            // Add default value if no events are found
            if ($events->isEmpty()) {
                $events = '1';
            }
        
            $result[] = [
                'assetevent' => $event,
                'events' => $events,
            ];
        }

        return response()->json($result);
    }

  /*  public function downloadQrCodesZip()
{
    $assets = Asset::all(); // Adjust this query if needed

    $tempPath = storage_path('app/temp');
    if (!file_exists($tempPath)) {
        mkdir($tempPath, 0777, true);
    }

    $zipFileName = 'qrcodes_' . now()->format('Ymd_His') . '.zip';
    $zipFullPath = $tempPath . '/' . $zipFileName;

    $zip = new ZipArchive;
    if ($zip->open($zipFullPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
        return response()->json(['error' => 'Could not create ZIP file.'], 500);
    }

    foreach ($assets as $asset) {
        $tag = $asset->assets_tag_id;

        // ✅ Step 1: Generate QR Code as SVG
        $svg = QrCode::format('svg')->size(300)->generate($tag);

        // ✅ Step 2: Convert SVG to PNG using Intervention Image
        $png = Image::make($svg)->encode('png');

        // ✅ Step 3: Add PNG image to ZIP
        $zip->addFromString("{$tag}.png", $png);
    }

    $zip->close();

    return response()->download($zipFullPath, $zipFileName, [
        'Content-Type' => 'application/zip',
    ])->deleteFileAfterSend(true);
}
*/
    
}
