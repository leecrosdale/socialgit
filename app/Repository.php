<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $fillable = ['name'];


    public function platforms()
    {
        return $this->belongsToMany(Platform::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
