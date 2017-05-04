<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = 'projects';
    protected $fillable = ['name', 'description', 'created_at', 'updated_at'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
