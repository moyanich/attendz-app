<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departments extends Model
{
    use HasFactory;

    protected $casts = [
        'manager_id'    => 'integer',
        'supervisor_id' => 'integer',
        'emp_id'        => 'integer',
    ];

    protected $rules = [
        'name'          => 'required|max:255',
        'supervisor_id' => 'numeric|nullable',
        'emp_id'        => 'numeric|nullable',
        'manager_id'    => 'numeric|nullable',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'emp_id',
        'manager_id',
        'supervisor_id',
    ];

    /**
     * Establishes the department -> users relationship
     *
     * @author A. Gianotto <snipe@snipe.net>
     * @since [v4.0]
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function users()
    {
        return $this->hasMany('\App\Models\User', 'department_id');
    }

     /**
     * Establishes the department -> manager relationship
     *
     * @author A. Gianotto <snipe@snipe.net>
     * @since [v4.0]
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function manager()
    {
        return $this->belongsTo('\App\Models\User', 'manager_id');
    }


    /**
     * Establishes the department -> manager relationship
     *
     * @author A. Gianotto <snipe@snipe.net>
     * @since [v4.0]
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function supervisor()
    {
        return $this->belongsTo('\App\Models\User', 'supervisor_id');
    }



}
