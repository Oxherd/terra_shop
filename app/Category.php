<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function classifications()
    {
        return $this->hasMany(Classification::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
