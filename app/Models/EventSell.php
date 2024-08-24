<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSell extends Model
{
    use HasFactory;

    protected $table = 'tbl_event_sell_assets';
    protected $primaryKey = 'sell_asset_id';

    protected $fillable = [
        'event_id',
        'asset_id',
        'sale_date',
        'sold_to',
        'sale_amount',
        'sell_notes',
        'delete',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
