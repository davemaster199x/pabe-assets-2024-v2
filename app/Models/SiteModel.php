<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_sites';
    protected $primaryKey = 'site_id';
    protected $fillable = ['site_name', 'delete'];
}
