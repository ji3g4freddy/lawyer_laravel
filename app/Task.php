<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
	protected $table = 'tasks';
    protected $fillable = ['date','hour','category','description','created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
