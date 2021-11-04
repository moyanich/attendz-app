<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

     // Table Name
     protected $table = 'employees';

     // Primary Key
     public $primaryKey = 'id';
 
     // Timestamps
     public $timestamps = true;
 
}
