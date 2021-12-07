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
        'emp_no',
        'firstname',
        'middlename',
        'lastname',
        'email',
        'phone_number',
        'emergency_number',
        'date_of_birth',
        'retirement_date',
        'hire_date',
        'nis',
        'trn',
        'gender_id',
        'current_address',
        'permanent_address',
        'city',
        'parish_id',
        'notes',
        'photo',
        'department_id',
        'status_id'
    ];

    protected $dates = [
        'retirement_date',
        'date_of_birth'
    ];

    /**
     * Get the employee's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    /**
     * Get the employee's full name.
     *
     * @return string
     */
    public function getCompleteNameAttribute()
    {
        return "{$this->firstname} {$this->middlename} {$this->lastname}";
    }

    /**
     * Get the parish associated with the employee.
     */
    public function parish()
    {
        return $this->hasOne(Parishes::class, 'parish_id');
    }

   
 
}
