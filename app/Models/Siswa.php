<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto',
        'email_orang_tua',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
