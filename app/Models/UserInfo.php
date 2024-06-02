<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserInfo extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'avatar',
        'company',
        'phone',
        'otp',
        'otp_verified_at',
        'website',
        'country',
        'language',
        'timezone',
        'specialist_type',
    ];

    
    /**
     * Prepare proper error handling for url attribute
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        return $this->avatar ? Storage::url($this->avatar) : asset(theme()->getMediaUrlPath().'avatars/blank.png');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
