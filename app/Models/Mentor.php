<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto',
        'profesi',
        'deskripsi',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
