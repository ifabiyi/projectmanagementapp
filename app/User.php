<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'city','
        role_id'
    ];

    protected function role(){
        
          return $this->belongsTo(Role::class);
    }

    protected function companies(){
        return $this->hasMany(Company::class);
    }
    public function tasks(){
        return $this->belongsToMany(Task::class);
    }
    public function projects(){
        return $this->belongsToMany(Project::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

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
}
