<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function otherServices()
    {
        return $this->hasMany(OtherService::class);
    }

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
