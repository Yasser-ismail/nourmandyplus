<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    use Sluggable;


    protected $fillable = [
        'name',
        'meta_keywords',
        'meta_des',
    ];

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

    public function videos(){
        return $this->hasMany('App\Models\Video');
    }

}
