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
        'education',
        'institution',
        'education_types_id',
        'course',
        'startYear',
        'endYear',
    ];

}
