<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEducations extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'employee_educations';

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
        'employee_id',
        'institution',
        'course',
        'education_types_id',
        'startYear',
        'endYear',
    ];

}
