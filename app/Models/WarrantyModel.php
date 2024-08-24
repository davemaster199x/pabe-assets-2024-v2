<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarrantyModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_warranty';
    protected $primaryKey = 'warranty_id';

    protected $fillable = [
        'asset_id',
        'length',
        'expiration_date',
        'warranty_notes',
        'delete',
    ];
}
