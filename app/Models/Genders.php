<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genders extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'genders';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    protected $fillable = ['name'];

}
