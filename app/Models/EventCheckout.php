<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCheckout extends Model
{
    use HasFactory;

    // Specify the table name if it doesn’t follow Laravel's naming convention
    protected $table = 'tbl_event_checkout';

    // Specify the primary key column
    protected $primaryKey = 'checkout_id';

    // Indicate that the primary key is auto-incrementing
    public $incrementing = true;

    // Specify the data type of the primary key
    // protected $keyType = 'bigint'; // 'int' or 'bigint' depending on your column type

    // Define which attributes are mass assignable
    protected $fillable = [
        'event_id',
        'checkout_date',
        'person_id',
        'due_date',
        'site_id',
        'location_id',
        'department_id',
        'checkout_notes',
        'concent',
        'delete',
    ];
}
