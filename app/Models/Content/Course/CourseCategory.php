<?php

namespace App\Models\Content\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;
    protected $table = 'course_categories';
    protected $fillable = ['name', 'image','user_id', 'slug', 'parent_id'];
}
