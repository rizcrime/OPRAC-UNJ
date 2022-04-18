<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accompaniment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'classroom'];

    public function classrooms()
    {
        return $this->belongsTo(Classroom::class, 'classroom', 'id');
    }
}
