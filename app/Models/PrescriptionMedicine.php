<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;


class PrescriptionMedicine extends Model
{
    use HasFactory;

    public function user()
    {
        // return $this->hasOne(User::class);
        return $this->hasOne(Patient::class,'user_id','user_id');
    }
}
