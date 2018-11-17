<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table="course";
    const CREATED_AT='created_date';
    const UPDATED_AT='updated_date';
    public $timestamps=false;
 
}
