<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    //
    protected $table = 'assign';
    protected $fillable = ['user_id','project_id'];
}
