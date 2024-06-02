<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointment_id'
    ];


    public function prescriptionMedicine()
    {
         
        return $this->hasMany(PrescriptionMedicine::class,'prescription_id','id');
    }

    public function appointment(){
         return $this->hasOne(Appoinment::class,'id','appointment_id');
    }
}
