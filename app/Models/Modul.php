<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    public function subModuls()
    {
        return $this->hasMany('App\Models\SubModul');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas');
    }

    public function mata_pelajaran()
    {
        return $this->belongsTo('App\Models\MataPelajaran');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori');
    }
}
