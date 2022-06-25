<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DataTables;
use App\Http\Requests\MateriModulPostRequest;

use App\Models\Modul;
use App\Models\SubModul;
use App\Models\MateriModul;

class MateriModulController extends Controller
{
    public function index($id_modul, $id_sub_modul)
    {
        $modul = Modul::findOrFail($id_modul);
        $subModul = SubModul::where([['id',$id_sub_modul],['modul_id',$id_modul]])->firstOrFail();
        return view('mentor.modul.sub-modul.materi.index', compact('modul','subModul'));
    }
    
    public function data(Request $request, $id_modul, $id_sub_modul)
    {
        if($request->ajax())
        {
            $modul = Modul::findOrFail($id_modul);
            $subModul = SubModul::where([['id',$id_sub_modul],['modul_id',$id_modul]])->firstOrFail();
            $data = MateriModul::where('sub_modul_id',$id_sub_modul)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tipe', function($row){
                    return $row->tipe == 1 ? "Embed YouTube":"PDF";
                })
                ->addColumn('isi', function($row){
                    if($row->tipe == 1) {
                        return '<a href="'.$row->isi.'" target="_blank">'.$row->isi.'</a>';
                    }else{
                        return '<a href="'.url('/storage/pdf/materi').'/'.$row->isi.'" target="_blank">'.$row->isi.'</a>';
                    }
                    return '';
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <a href="#" onclick="deleteData()" data-value="'.$row->id.'" data-judul="'.$row->judul.'" class="delete btn btn-outline-danger btn-sm mx-1"><i class="fa fa-trash"></i> Hapus</a>
                        <form id="delete-data-'.$row->id.'" action="'.route('mentor.modul.sub-modul.materi.destroy', [$row->sub_modul->modul->id, $row->sub_modul_id, $row->id]).'" method="POST" class="d-none">
                            '.csrf_field().method_field('DELETE').'
                        </form>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['isi','action'])
                ->make(true);
        }
        
    }

    public function store(MateriModulPostRequest $request, $id_modul, $id_sub_modul)
    {
        try
        {
            $modul = Modul::findOrFail($id_modul);
            $subModul = SubModul::where([['id',$id_sub_modul],['modul_id',$id_modul]])->firstOrFail();
            $validated = $request->validated();
            
            $materi                 = new MateriModul();
            $materi->sub_modul_id   = $subModul->id;
            $materi->judul          = $request->judul;
            $materi->tipe           = $request->tipe;
            if($request->pdf != null){
                $pdf = $request->file('pdf')->store('public/pdf/materi/');
                $materi->isi        = $request->file('pdf')->hashName();
            }else{
                $materi->isi        = $request->embed_youtube;
            }
            $materi->save();
    
            return back()->with('success', $materi->judul . ' berhasil ditambahkan.');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data gagal ditambahkan.');
        }
    }
    
    public function destroy($id_modul, $id_sub_modul, $id)
    {
        try
        {
            $modul = Modul::findOrFail($id_modul);
            $subModul = SubModul::where([['id',$id_sub_modul],['modul_id',$id_modul]])->firstOrFail();
            $materi = MateriModul::where([['sub_modul_id',$id_sub_modul],['id',$id]])->firstOrFail();
            $judul_materi = $materi->judul;
            Storage::delete('public/pdf/materi/'.$materi->isi);
            $materi->delete();
    
            return redirect()->route('mentor.modul.sub-modul.materi.index', [$id_modul, $id_sub_modul])->with('success', $judul_materi . ' berhasil dihapus!');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data tidak bisa dihapus karena berelasi dengan tabel/data lain.');
        }
    }
}
