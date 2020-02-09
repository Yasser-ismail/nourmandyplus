<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Tag extends Model
{
    use Sluggable;

    protected $fillable = ['name'];

    public function videos(){
        return $this->belongsToMany('App\Models\Video', 'tags_videos');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getNameAttribute($name){
        return ucwords($name);
    }
}
