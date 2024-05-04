<?php

namespace App\Models\Content\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseEpisode extends Model
{
    use HasFactory;
    protected $table = 'course_episodes';
    protected $fillable = [
        'name',
        'description',
        'file_path',
        'file_size',
        'file_type',
        'status',
        'course_id',
    ];
}
