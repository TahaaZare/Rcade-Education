<?php

namespace App\Models\Content\Blog;

use App\Models\Account\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Shetabit\Visitor\Traits\Visitable;

class Blog extends Model
{
    use HasFactory;
    use Visitable;
    protected $table = 'blogs';
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'create_by',
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
    public function user($id)
    {
        $user = User::find($id);
        return $user;
    }
}
