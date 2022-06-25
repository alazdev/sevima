<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;

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
        $admin  = User::where('level',2)->count();
        $mentor = User::where('level',3)->count();
        $siswa  = User::where('level',4)->count();

        $data = [
            'admin' => $admin,
            'mentor' => $mentor,
            'siswa' => $siswa,
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
        
        $barChart = [
            'data' => $barUser->pluck('total')->toArray(),
            'tanggal' => $barUser->pluck('bulan_tahun')->toArray(),
        ];
        return response()->json($barChart);
    }
}
