<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrailUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'trail_id',
        'trail_status'
    ];

    public function rules()
    {
        return [
            'trail_id' => "unique:trail_users,trail_id,NULL,id,user_id,{$this->user->id}",
        ];
    }

    public function messages()
    {
        return [
            'unique' => 'Você já se cadastrou nesta trilha.',
        ];
    }
}
