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

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'email_address',
        //'phone_number1',
        //'phone_number2',
        //'dob',
        'retirement_date',
        'hire_date',
        'location_id',
        'tax_info_id',
        'gender_id',
        'address', 
        'city',
        'parish_id',
        'notes',
        'status_id'
        
    ];

    protected $dates = [
        'retirement_date', 
        'dob'
    ];
    
 
}
