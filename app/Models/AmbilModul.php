<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbilModul extends Model
{
    use HasFactory;

    public function modul()
    {
        return $this->belongsTo('App\Models\Modul');
    }
}
