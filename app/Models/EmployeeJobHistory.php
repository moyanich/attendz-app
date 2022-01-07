<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeJobHistory extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'employee_job_histories';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'employee_id',
        'job_id',
        'department_id',
        'notification_period',
        'start_date',
        'end_date',
        'status_id'
    ];
}
