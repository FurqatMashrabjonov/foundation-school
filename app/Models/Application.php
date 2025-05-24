<?php

namespace App\Models;

use App\Enums\CourseType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'phone',
        'course_type',
        'status',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
        'course_type' => CourseType::class,
//        'status' => ApplicationStatus::class,
    ];
}
