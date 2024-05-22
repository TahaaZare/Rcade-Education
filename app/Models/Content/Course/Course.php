<?php

namespace App\Models\Content\Course;

use App\Models\Account\User as AccountUser;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'category_id',
        'master_id',
        'create_by',
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

    public function cat($id)
    {
        $category = CourseCategory::find($id);
        return $category;
    }

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
        return $this->belongsTo(AccountUser::class);
    }
    public function user()
    {
        return $this->belongsTo(AccountUser::class,'create_by');
    }
}
