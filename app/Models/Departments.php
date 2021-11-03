<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departments extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'departments';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

   /* protected $casts = [
        'manager_id'    => 'integer',
        'supervisor_id' => 'integer',
        'emp_id'        => 'integer',
    ];

    protected $rules = [
        'name'          => 'required|max:255',
        'supervisor_id' => 'numeric|nullable',
        'emp_id'        => 'numeric|nullable',
        'manager_id'    => 'numeric|nullable',
    ]; */


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description'
    ];
    
    /**
     * 
     * Get the user associated with the department.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


   /* public function manager() WORKS!!
    {
        return $this->hasOne(User::class, 'id', 'manager_id');
    } */

    public function manager()
    {
        return $this->belongsTo(User::class, 'id');
    }

    /**
     * The users that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    /*public function manager()
    {
        return $this->belongsTo(Departments::class, 'department_manager', 'user_id', 'department_id');

        // return $this->belongsToMany('App\Models\Users');
    } */

    /**
     * Establishes the department -> users relationship
     *
     * @author A. Gianotto <snipe@snipe.net>
     * @since [v4.0]
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
  /*  public function users()
    {
        return $this->hasMany('\App\Models\User', 'department_id');
    } */


     /**
     * Establishes the department -> manager relationship
     *
     * @author A. Gianotto <snipe@snipe.net>
     * @since [v4.0]
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
  /*  public function manager()
    {
        return $this->belongsTo('\App\Models\User', 'manager_id');
    } */


    /**
     * Establishes the department -> manager relationship
     *
     * @author A. Gianotto <snipe@snipe.net>
     * @since [v4.0]
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
   /* public function supervisor()
    {
        return $this->belongsTo('\App\Models\User', 'supervisor_id');
    } */

    


}
