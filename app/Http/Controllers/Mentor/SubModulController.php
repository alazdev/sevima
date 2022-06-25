<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\SubModulPostRequest;

use App\Models\Modul;
use App\Models\SubModul;

class SubModulController extends Controller
{
    public function index($id_modul)
    {
        $modul = Modul::findOrFail($id_modul);
        return view('mentor.modul.sub-modul.index', compact('modul'));
    }
    
    public function data(Request $request, $id_modul)
    {
        if($request->ajax())
        {
            $modul = Modul::findOrFail($id_modul);
            $data = SubModul::where('modul_id',$id_modul)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <a href="'.route('mentor.modul.sub-modul.materi.index', [$row->modul_id, $row->id]).'" class="edit btn btn-outline-info btn-sm mx-1"><i class="fa fa-cog"></i> Konfigurasi Materi</a> 
                        <a href="#" onclick="deleteData()" data-value="'.$row->id.'" data-judul="'.$row->judul.'" class="delete btn btn-outline-danger btn-sm mx-1"><i class="fa fa-trash"></i> Hapus</a>
                        <form id="delete-data-'.$row->id.'" action="'.route('mentor.modul.sub-modul.destroy', [$row->modul_id, $row->id]).'" method="POST" class="d-none">
                            '.csrf_field().method_field('DELETE').'
                        </form>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
    }

    public function store(SubModulPostRequest $request, $id_modul)
    {
        try
        {
            $modul = Modul::findOrFail($id_modul);
            $validated = $request->validated();
            
            $subModul           = new SubModul();
            $subModul->modul_id = $modul->id;
            $subModul->judul    = $request->judul;
            $subModul->save();
    
            return back()->with('success', $subModul->judul . ' berhasil ditambahkan.');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data gagal ditambahkan.');
        }
    }
    
    public function destroy($id_modul, $id)
    {
        try
        {
            $modul = Modul::findOrFail($id_modul);
            $subModul = SubModul::where([['modul_id',$id_modul],['id',$id]])->firstOrFail();
            $judul_subModul = $subModul->judul;
            $subModul->delete();
    
            return redirect()->route('mentor.modul.sub-modul.index', $id_modul)->with('success', $judul_subModul . ' berhasil dihapus!');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data tidak bisa dihapus karena berelasi dengan tabel/data lain.');
        }
    }
}
