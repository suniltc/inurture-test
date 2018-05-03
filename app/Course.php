<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'user_id', 'name', 'course_type', 'course_id',
    ];
}
