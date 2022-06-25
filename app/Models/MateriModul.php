<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriModul extends Model
{
    use HasFactory;

    public function sub_modul()
    {
        return $this->belongsTo('App\Models\SubModul');
    }
}
