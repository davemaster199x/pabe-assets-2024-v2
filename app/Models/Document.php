<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    // Table name associated with the model
    protected $table = 'tbl_docs';

    // The primary key associated with the table
    protected $primaryKey = 'docs_id';
    protected $fillable = [
        'file_name',
        'file_path',
        'file_type',
        'asset_id',
        'user_id',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
