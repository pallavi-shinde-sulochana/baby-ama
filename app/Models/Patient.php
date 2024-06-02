<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;


    public function user()
    {
        // return $this->hasOne(User::class);
        return $this->hasOne(User::class,'id','user_id');
    }

    public function appointments()
    {
        // return $this->hasMany(ProjectNote::class,'operative');
    }

    public function vaccination_report()
    {
        // return $this->hasMany(ProjectNote::class,'operative');
    }

    public function prescription_report()
    {
        // return $this->hasMany(ProjectNote::class,'operative');
    }

    public function pediatric_report()
    {
        // return $this->hasMany(ProjectNote::class,'operative');
    }
    public function dental_report()
    {
        // return $this->hasMany(ProjectNote::class,'operative');
    }
    
    public function getNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }
}
