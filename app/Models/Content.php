<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'description',
        'page',
    ];

    public function pages(){
        return $this->belongsTo(Page::class, 'page', 'id');
    }

}
