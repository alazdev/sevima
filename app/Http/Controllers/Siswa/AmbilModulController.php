<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

use App\Models\Modul;
use App\Models\AmbilModul;

class AmbilModulController extends Controller
{
    public function index()
    {
        return view('siswa.ambil-modul.index');
    }
    
    public function data(Request $request)
    {
        if($request->ajax())
        {
            $data = AmbilModul::with('modul')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <a href="'.route('siswa.ambil-modul.show', $row->modul->id).'" class="edit btn btn-outline-secondary btn-sm mx-1"><i class="fa fa-eye"></i> Lihat</a>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        
    }

    public function ambilModul(Request $request, $id)
    {
        try
        {
            if(auth()->User()->level < 4) {
                return back()->with('error', 'Hanya Siswa yang bisa mengambil modul.');
            }

            $status = AmbilModul::where([['modul_id',$id],['user_id',auth()->User()->id]])->count();
            if($status > 0){
                return back()->with('error', 'Anda sudah mengambil modul ini sebelumnya, cek menu Buku Diambil');
            }
            
            $AmbilModul              = new AmbilModul();
            $AmbilModul->modul_id    = $id;
            $AmbilModul->user_id     = auth()->User()->id;
            $AmbilModul->save();
    
            return back()->with('success', 'Modul berhasil diambil.');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Modul gagal diambil.');
        }
    }
    
    public function show($id)
    {
        AmbilModul::where([['modul_id',$id],['user_id',auth()->User()->id]])->firstOrFail();
        $modul = Modul::findOrFail($id);

        return view('siswa.ambil-modul.detail', compact('modul'));
    }
}
