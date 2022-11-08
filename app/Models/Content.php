<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'title',
        'description',
        'time',
        'type',
        'link',
        'content_by',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
