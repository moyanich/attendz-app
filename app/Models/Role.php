<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    // Table Name
    protected $table = 'roles';

    // Primary Key
    public $primaryKey = 'id';
 
    // Timestamps
    public $timestamps = true;

    protected $fillable = ['name'];

    /**
     * The users that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');

        // return $this->belongsToMany('App\Models\Users');
    }
  
}
