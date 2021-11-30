<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'files';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'employee_id',
        'description',
        'name',
        'type',
        'size',
        'tag'
    ];
}
