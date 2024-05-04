<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPointLog extends Model
{
    use HasFactory;
    protected $table = 'user_point_logs';
    protected $fillable = [
        'user_id',
        'point_id',
        'log'
    ];
}
