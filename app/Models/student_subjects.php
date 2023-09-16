<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_subjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'student_subject',
        'subject_id',
        'grade',
    ];
    
}
