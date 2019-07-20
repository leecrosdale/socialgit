<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepositoryData extends Model
{
    protected $fillable = ['repository_id', 'platform_id', 'data'];
    protected $casts = ['data' => 'object'];

}
