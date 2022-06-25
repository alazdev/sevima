<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Status;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Kategori;
use App\Models\Modul;

class MentorController extends Controller
{
    public function kelas(Request $request)
    {
        if ($request->ajax())
        {
            $kelas = Kelas::where('status_id',$request->status_id)->pluck("nama","id");
            return response()->json($kelas);
        }
        return abort(404);
    }
    public function mataPelajaran(Request $request)
    {
        if ($request->ajax())
        {
            $mataPelajaran = MataPelajaran::where('status_id',$request->status_id)->pluck("nama","id");
            return response()->json($mataPelajaran);
        }
        return abort(404);
    }
    public function kategori(Request $request)
    {
        if ($request->ajax())
        {
            $kategori = Kategori::pluck("nama","id");
            return response()->json($kategori);
        }
        return abort(404);
    }
}
