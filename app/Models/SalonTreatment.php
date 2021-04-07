<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonTreatment extends Model
{
    use HasFactory;

    public function singleSalonTreatment()
    {
        return $this->hasMany(SingleSalonTreatment::class, 'category');
    }

}
