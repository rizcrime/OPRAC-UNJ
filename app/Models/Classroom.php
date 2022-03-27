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
        'logo',
        'class_id',
        'lesson_id',
        'user_id',
        'link_g_meet',
    ];
}
