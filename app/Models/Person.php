<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'tbl_persons';

    // Define the primary key for the table
    protected $primaryKey = 'person_id';

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'full_name',
        'emp_id',
        'title',
        'phone',
        'email',
        'site_id',
        'location_id',
        'department_id',
        'notes',
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class, 'person_id', 'person_id');
    }

    // Optionally, define relationships with other models
    // public function site()
    // {
    //     return $this->belongsTo(Site::class, 'site_id');
    // }

    // public function location()
    // {
    //     return $this->belongsTo(Location::class, 'location_id');
    // }

    // public function department()
    // {
    //     return $this->belongsTo(Department::class, 'department_id');
    // }
}
