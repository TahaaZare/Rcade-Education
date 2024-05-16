<?php

namespace App\Models\Content\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = [
        'create_by',
        'question',
        'answer',
        'status',
    ];
}
