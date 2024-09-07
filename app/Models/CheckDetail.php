<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckDetail extends Model
{
    use HasFactory;

    // Define the table name if it's not pluralized automatically by Laravel
    protected $table = 'check_details';

    // The attributes that are mass assignable
    protected $fillable = [
        'asset_id',
        'date',
        'check_no',
        'description',
        'amount',
        'due_date',
        'status',
        'bank'
    ];
}
