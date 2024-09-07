<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMode extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'payment_mode';

    // The attributes that are mass assignable
    protected $fillable = [
        'payment_name', 
        'delete'
    ];
}
