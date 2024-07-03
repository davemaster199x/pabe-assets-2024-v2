<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'tbl_status';

    protected $fillable = [
        'status_id', 'status_name', // Add other fields as necessary
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class, 'status_id', 'status_id');
    }
}
