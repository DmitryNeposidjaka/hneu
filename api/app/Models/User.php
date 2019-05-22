<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Bouncer;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes, Filterable, HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'firstname', 'lastname', 'lang', 'thumbnail', 'email', 'username', 'moodle_id', 'role', 'moodle_token', 'student_id'
    ];

    protected $appends = ['fullname', 'role', 'thumbnail_img'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->id;
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getThumbnailImgAttribute()
    {
        if($this->thumbnail){
            return \Storage::disk('user-img')->url($this->thumbnail);
        }
        return \Storage::disk('public')->url('images/default/img_avatar.png');
    }

    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function setRoleAttribute($value)
    {
        if ($this->id) {
            $this->roles()->sync([]);
            $this->assign($value);
        }
    }

    public function getRoleAttribute()
    {
        $roles = $this->getRoles()->toArray();
        return is_array($roles) && !empty($roles) ? array_pop($roles) : null;
    }

}
