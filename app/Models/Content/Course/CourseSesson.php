<?php

namespace App\Models\Content\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseSesson extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'course_sessons';
    protected $fillable = [
        'name',
        'course_id'
    ];
    public function course($id)
    {
        $course = Course::find($id);
        return $course;
    }
}
