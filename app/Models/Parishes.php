<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parishes extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'parishes';

    // Primary Key
    public $primaryKey = 'id';
 
    // Timestamps
    public $timestamps = true;

    protected $fillable = ['name'];
}
