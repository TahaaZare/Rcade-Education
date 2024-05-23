<?php

namespace App\Models\Content\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterRules extends Model
{
    use HasFactory;
    protected $table = "master_rules_for_request_course";
    protected $fillable = ['description'];
}
