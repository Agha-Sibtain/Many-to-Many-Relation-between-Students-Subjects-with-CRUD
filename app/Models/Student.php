<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
    ];

    public function subjects()
    {
        return $this->belongsToMany('App\Models\Subjects');
    }

}
