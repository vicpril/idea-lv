<?php

namespace Idea\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    public function users() {
        return $this->belongsToMany('Idea\Models\User', 'user_user');
    }
}
