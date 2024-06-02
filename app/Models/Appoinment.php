<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    use HasFactory;

    public function user()
    {
        // return $this->hasOne(User::class);
        return $this->hasOne(User::class,'id','user_id');
    }
    public function doctor()
    {
        // return $this->hasOne(User::class);
        return $this->hasOne(User::class,'id','doctor_id');
    }
    public function prescription()
    {
        // return $this->hasOne(User::class);
        return $this->hasOne(Prescription::class,'appointment_id','id');
    }
}
