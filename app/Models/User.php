<?php

namespace App\Models;

use Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        //'name',
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mutator: Hash Password
     * 
     * A mutator transforms an Eloquent attribute value when it is set. To define a mutator
     * define a set{Attribute}Attribute method on your model where {Attribute} is the "studly"
     * cased name of the column you wish to access.
     * 
     * @param  string  $password
     * @return void
     */
    public function setPasswordAttribute($password) 
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
        // return $this->belongsToMany('App\Models\Role');
    }

    /**
     * Check if the user has a role
     * 
     * @param $string $role
     * @return bool
     */
    public function hasAnyRole(string $role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * Check if the user has any given role
     * 
     * @param array $role
     * @return bool
     */
    public function hasAnyRoles(array $role) 
    {
        return null !== $this->roles()->whereIn('name', $role)->first();
    }

   
   

}
