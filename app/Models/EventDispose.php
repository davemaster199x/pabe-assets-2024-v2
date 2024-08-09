<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventDispose extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_event_dispose';
    protected $primaryKey = 'dispose_id';
    protected $fillable = [
        'event_id',
        'asset_id',
        'date_disposed',
        'dispose_to',
        'dispose_notes',
        'delete',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
