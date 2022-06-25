<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\ModulPostRequest;

use App\Models\Status;
use App\Models\Kategori;
use App\Models\Modul;

class ModulController extends Controller
{
    public function index()
    {
        $status = Status::latest()->get();
        $kategori = Kategori::latest()->get();
        return view('mentor.modul.index', compact('status', 'kategori'));
    }
    
    public function data(Request $request)
    {
        if($request->ajax())
        {
            $data = Modul::where('user_id',auth()->User()->id)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    if($row->status == 0)
                    {
                        return '<span class="badge badge-outline-info">Belum diverifikasi</span>';
                    }
                    else if($row->status == 1)
                    {
                        return '<span class="badge badge-outline-warning">Dalam permintaan verifikasi</span>';
                    }
                    else if($row->status == 2)
                    {
                        return '<span class="badge badge-outline-success">Terverifikasi</span>';
                    }
                    return '';
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <a href="'.route('mentor.modul.show', $row->id).'" class="edit btn btn-outline-secondary btn-sm mx-1"><i class="fa fa-eye"></i> Lihat</a> 
                        <a href="'.route('mentor.modul.sub-modul.index', $row->id).'" class="edit btn btn-outline-info btn-sm mx-1"><i class="fa fa-cog"></i> Konfigurasi Sub Modul</a> 
                        <a href="#" onclick="deleteData()" data-value="'.$row->id.'" data-judul="'.$row->judul.'" class="delete btn btn-outline-danger btn-sm mx-1" disabled><i class="fa fa-trash"></i> Hapus</a>
                        <form id="delete-data-'.$row->id.'" action="'.route('mentor.modul.destroy', $row->id).'" method="POST" class="d-none">
                            '.csrf_field().method_field('DELETE').'
                        </form>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        
    }

    public function store(ModulPostRequest $request)
    {
        try
        {
            $validated = $request->validated();
            
            
            if($request->sampul != null){
                $sampul = $request->file('sampul')->store('public/image/modul/sampul');
            }
    
            $modul                      = new Modul();
            $modul->status_id           = $request->status_id;
            $modul->kelas_id            = $request->kelas_id;
            $modul->mata_pelajaran_id   = $request->mata_pelajaran_id;
            $modul->kategori_id         = $request->kategori_id;
            $modul->judul               = $request->judul;
            $modul->sampul              = $request->sampul != null ? $request->file('sampul')->hashName() : NULL;
            $modul->user_id             = auth()->User()->id;
            $modul->save();
    
            return back()->with('success', $modul->judul . ' berhasil ditambahkan.');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data gagal ditambahkan.');
        }
    }
    
    public function show($id)
    {
        $modul = Modul::findOrFail($id);

        return view('mentor.modul.detail', compact('modul'));
    }

    public function destroy($id)
    {
        try
        {
            $modul = Modul::findOrFail($id);
            $judul_modul = $modul->judul;
            $modul->delete();
    
            return redirect()->route('admin.modul.index')->with('success', $judul_modul . ' berhasil dihapus!');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data tidak bisa dihapus karena berelasi dengan tabel/data lain.');
        }
    }
}
