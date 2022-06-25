<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function kelases()
    {
        return $this->hasMany('App\Models\Kelas');
    }

    public function mataPelajarans()
    {
        return $this->hasMany('App\Models\MataPelajaran');
    }
}
