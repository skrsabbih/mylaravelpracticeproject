<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // profile data added in profiles table
    protected $fillable = [
        'user_id', 'photo', 'phone', 'address', 'document'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
