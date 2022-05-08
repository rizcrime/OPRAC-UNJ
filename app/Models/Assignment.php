<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student',
        'subject',
        'file',
        'description',
    ];

    public function subjects(){
        return $this->belongsTo(Subject::class, 'subject', 'id');
    }
}
