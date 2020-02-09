<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Skill extends Model
{
    use Sluggable;


    protected $fillable = [
        'name',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function videos() {
        return $this->belongsToMany('App\Models\Video', 'skills_videos');
    }

    public function getNameAttribute($name){
        return ucwords($name);
    }
}
