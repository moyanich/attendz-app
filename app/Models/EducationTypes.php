<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationTypes extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'education_types';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    protected $rules = [
        'name' => 'required|max:255'
    ]; 

    /**
     * The attributes that are mass assignable.
    *
    * @var string[]
    */
    protected $fillable = [
        'name'
    ];


}
