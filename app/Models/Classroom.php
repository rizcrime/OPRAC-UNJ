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
        'class',
        'lesson',
        'members',
        'link_g_meet',
    ];
}
