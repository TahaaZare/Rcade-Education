<?php

namespace App\Models\Content\Course;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'master_id',
        'name',
        'summary',
        'description',
        'image',
        'price',
        'slug',
        'short_link',
        'course_level',
        'course_status',
        'status',
        'comment_able',
        'tags',
        'meta_keywords',
        'meta_description',
    ];

    public function category()
    {
        return $this->belongsTo(CourseCategory::class);
    }
    public function edisode()
    {
        return $this->hasMany(CourseEpisode::class);
    }
    public function master()
    {
        return $this->belongsTo(User::class);
    }
}
