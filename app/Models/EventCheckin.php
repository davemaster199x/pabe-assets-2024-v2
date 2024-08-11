<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCheckin extends Model
{
    use HasFactory;

    // Table name associated with the model
    protected $table = 'tbl_event_checkin';

    // The primary key associated with the table
    protected $primaryKey = 'checkin_id';

    // The attributes that are mass assignable
    protected $fillable = [
        'event_id',
        'return_date',
        'site_id',
        'location_id',
        'department_id',
        'checkin_notes',
        'delete', // Use a different name like 'deleted' for clarity if needed
        'created_at',
        'updated_at',
    ];
}
