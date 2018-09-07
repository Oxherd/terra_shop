<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
