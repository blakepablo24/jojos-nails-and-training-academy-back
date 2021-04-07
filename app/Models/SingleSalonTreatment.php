<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleSalonTreatment extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(SalonTreatment::class, 'category');
    }

}
