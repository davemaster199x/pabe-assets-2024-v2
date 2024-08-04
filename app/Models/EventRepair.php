<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventRepair extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_event_repair';
    protected $primaryKey = 'repair_id';
    protected $fillable = [
        'event_id',
        'sched_date',
        'assigned_to',
        'date_completed',
        'repair_cost',
        'repair_notes',
        'delete',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
