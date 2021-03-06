<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
    * Ambos son por que cambié el id
    */
    protected $primaryKey = 'id';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'dv', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles){
      if (is_array($roles)) {
        return $this->hasAnyRole($roles) ||abort(401, 'Esta acción no está autorizada.');
      } 
      return $this->hasRole($roles) || abort(401, 'Esta acción no está autorizada.');
    }


    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles){
      return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role) {
      return null !== $this->roles()->where('name', $role)->first();
    }

    public function runFormat() {
      return number_format($this->id, 0,'.','.') . '-' . $this->dv;
    }

    public function scopeSearch($query, $name) {
      if($name != "") {
        return $query->where('name', "LIKE", "%$name%");  
      }  
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
