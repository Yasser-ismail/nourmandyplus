<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Video extends Model
{
    use Sluggable;


    protected $fillable = [

        'name', 'des', 'meta_keywords', 'meta_des',

        'youtube', 'published', 'user_id', 'category_id',

        'image','slug'

    ];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function skills() {
        return $this->belongsToMany('App\Models\Skill', 'skills_videos');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag', 'tags_videos');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    public function getNameAttribute($name){
        return ucwords($name);
    }

    public function scopePublished($query){

        return $query->where('published', 1);
    }

}
