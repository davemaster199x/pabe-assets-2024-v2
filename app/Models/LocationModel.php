<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_location';
    protected $fillable = ['location_name','site_id', 'delete'];
}
