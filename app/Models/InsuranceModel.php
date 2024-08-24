<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_insurances';
    protected $primaryKey = 'insurance_id';

    protected $fillable = [
        'description',
        'insurance_co',
        'contact_person',
        'phone',
        'email',
        'start_date',
        'end_date',
        'policy_no',
        'coverage',
        'limits',
        'deductible',
        'premium',
        'active',
        'delete',
    ];
}
