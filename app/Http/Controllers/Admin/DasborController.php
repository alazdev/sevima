<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Modul;
use App\Models\AmbilModul;

class DasborController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function pieChart()
    {
        $admin  = User::where('level',2)->count();
        $mentor = User::where('level',3)->count();
        $siswa  = User::where('level',4)->count();
        $total = $admin + $mentor + $siswa;

        $data = [
            'admin' => $admin,
            'mentor' => $mentor,
            'siswa' => $siswa,
            'persentaseAdmin' => number_format($admin / ($total) * 100, 2, ',', '.'),
            'persentaseMentor' => number_format($mentor / ($total) * 100, 2, ',', '.'),
            'persentaseSiswa' => number_format($siswa / ($total) * 100, 2, ',', '.'),
        ];
        return response()->json($data);
    }

    public function widget()
    {
        $modul  = Modul::count();
        $ambilModul = AmbilModul::count();

        $data = [
            'modul' => $modul,
            'ambilModul' => $ambilModul,
        ];
        return response()->json($data);
    }

    public function barChart()
    {
        $barUser = User::select([
                DB::raw('MIN(created_at) as tanggal'),
                DB::raw('DATE_FORMAT(MIN(created_at), "%m-%Y") as bulan_tahun'),
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('count(*) as total'),
            ])
            ->whereBetween('created_at', [now()->subMonth(11)->startOfMonth(), now()])
            ->groupBy('bulan')
            ->orderBy('tanggal')
            ->get();
        $barModul = Modul::select([
                DB::raw('MIN(created_at) as tanggal'),
                DB::raw('DATE_FORMAT(MIN(created_at), "%m-%Y") as bulan_tahun'),
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('count(*) as total'),
            ])
            ->whereBetween('created_at', [now()->subMonth(11)->startOfMonth(), now()])
            ->groupBy('bulan')
            ->orderBy('tanggal')
            ->get();
        $barAmbilModul = AmbilModul::select([
                DB::raw('MIN(created_at) as tanggal'),
                DB::raw('DATE_FORMAT(MIN(created_at), "%m-%Y") as bulan_tahun'),
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('count(*) as total'),
            ])
            ->whereBetween('created_at', [now()->subMonth(11)->startOfMonth(), now()])
            ->groupBy('bulan')
            ->orderBy('tanggal')
            ->get();
        
        $barChart = [
            'user' => [
                'data' => $barUser->pluck('total')->toArray(),
                'tanggal' => $barUser->pluck('bulan_tahun')->toArray(),
            ],
            'modul' => [
                'data' => $barModul->pluck('total')->toArray(),
                'tanggal' => $barModul->pluck('bulan_tahun')->toArray(),
            ],
            'ambilModul' => [
                'data' => $barAmbilModul->pluck('total')->toArray(),
                'tanggal' => $barAmbilModul->pluck('bulan_tahun')->toArray(),
            ],
        ];
        return response()->json($barChart);
    }
}
