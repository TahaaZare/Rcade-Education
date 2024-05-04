<?php

namespace App\Models\Content\Blog;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'category_id',
        'category_id',
        'meta_description',
        'image',
        'status',
        'slug',
    ];


    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
