<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Classroom extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'logo',
        'classname',
        'lesson',
        'members',
        'link_g_meet',
    ];

    public function accompaniments()
    {
        return $this->hasMany(Accompaniment::class, 'id', 'classroom');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'id', 'classroom');
    }

}
