<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusCodes extends Model
{
    use HasFactory;

    // Primary Key
    public $primaryKey = 'id';
 
    // Timestamps
    public $timestamps = true;

    protected $fillable = ['name'];

    public static function inactive_status() {
        $status_inactive = StatusCodes::where('name',  '=' , 'Inactive')->first();
        // $status_inactive = StatusCode::where('name', 'LIKE',  '%Inactive%')->first();
        return $status_inactive->id;
    }


    public static function expired_status() {
        $status_expired = StatusCodes::where('name', '=' , 'Expired')->first();
        return $status_expired->id;
    }

    public static function active_status() {
        $status_active = StatusCodes::where('name', '=' , 'Active')->first();
        return $status_active->id;
    }

}
