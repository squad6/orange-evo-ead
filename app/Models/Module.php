<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'trail_id',
        'title',
        'description',
        'time',
    ];

    public function trail()
    {
        return $this->belongsTo(Trail::class);
    }
}
