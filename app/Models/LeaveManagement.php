<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveManagement extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'leave_management';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'name',
        'allottedDays',
        'minServiceDays',
        'maxDaysAllowed',
        'description',
        'status_id',
    ];
}
