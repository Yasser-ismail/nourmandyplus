<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class DeviceToken extends Model
{
    protected $table = 'fcm_tokens';

    protected $fillable = ['token','device','user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
