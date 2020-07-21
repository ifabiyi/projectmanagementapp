<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
