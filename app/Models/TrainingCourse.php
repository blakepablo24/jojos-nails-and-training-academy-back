<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCourse extends Model
{
    use HasFactory;

    public function courseCurriculum()
    {
        return $this->hasMany(CourseCurriculum::class, 'course');
    }

}
