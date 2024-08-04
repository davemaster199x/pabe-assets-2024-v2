<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetEvent extends Model
{
    use HasFactory;

    protected $table = 'tbl_asset_events';

    protected $fillable = [
        'asset_id',
        'delete',
    ];
}
