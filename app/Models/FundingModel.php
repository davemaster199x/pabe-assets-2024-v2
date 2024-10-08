<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundingModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_fundings';
    protected $primaryKey = 'funding_id';
    protected $fillable = ['funding_name', 'delete'];
}
