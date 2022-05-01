<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file',
        'classroom',
        'description'
    ];

    public function classrooms()
    {
        return $this->belongsTo(Classroom::class, 'classroom', 'id');
    }

}
