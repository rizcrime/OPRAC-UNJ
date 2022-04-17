<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accompaniment extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom',
        'title',
        'description'
    ];

    /**
     * Get the user that owns the Accompaniment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom', 'id');
    }

}
