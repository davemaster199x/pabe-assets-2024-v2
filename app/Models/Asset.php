<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $primaryKey = 'asset_id';
    protected $table = 'tbl_assets';
    protected $fillable = [
        'insurance_id',
        'description',
        'assets_tag_id',
        'purchase_date',
        'cost',
        'purchase_from',
        'brand',
        'model',
        'serial_no',
        'site_id',
        'location_id',
        'category_id',
        'department_id',
        'asset_photo_file',
        'depreciable_asset',
        'depreciable_cost',
        'salvage_value',
        'assets_life',
        'depreciation_method',
        'date_acquired',
        'funding_source',
        'amount_debited',
        'status_id',
        'delete',
    ];

    // Define relationships if needed
    // Example: belongsTo relationships
    public function site()
    {
        return $this->belongsTo(SiteModel::class, 'site_id');
    }

    public function location()
    {
        return $this->belongsTo(LocationModel::class, 'location_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function department()
    {
        return $this->belongsTo(DepartmentModel::class, 'department_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'status_id');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'person_id');
    }

    public function insurance()
    {
        return $this->belongsTo(InsuranceModel::class, 'insurance_id');
    }
    
    // Add any other relationships as needed
}

