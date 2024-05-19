<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class appointments extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'appointment_date',
        'p_name',
        'notes'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
