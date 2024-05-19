<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\appointments;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'speciality'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointments::class);
    }
}
