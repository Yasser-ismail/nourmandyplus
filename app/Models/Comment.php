<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
      'user_id', 'video_id', 'body',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function  Video(){
        return $this->belongsTo('App\Models\Video');
    }
}
