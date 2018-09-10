<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
