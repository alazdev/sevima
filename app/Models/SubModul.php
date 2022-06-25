<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubModul extends Model
{
    use HasFactory;

    public function modul()
    {
        return $this->belongsTo('App\Models\Modul');
    }

    public function materis()
    {
        return $this->hasMany('App\Models\MateriModul');
    }
}
