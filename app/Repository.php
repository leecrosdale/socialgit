<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $fillable = ['name'];


    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function datum()
    {
        return $this->hasMany(RepositoryData::class);
    }

    public function data()
    {
        return $this->hasOne(RepositoryData::class);
    }


}
