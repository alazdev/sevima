<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

use App\Http\Requests\MataPelajaranPostRequest;

use App\Models\Status;
use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    public function index($id_status)
    {
        $status = Status::where([['id',$id_status],['tipe',1]])->firstOrFail();
        return view('admin.master-data.status.mata-pelajaran.index', compact('status'));
    }
    
    public function data(Request $request, $id_status)
    {
        if($request->ajax())
        {
            $status = Status::where([['id',$id_status],['tipe',1]])->firstOrFail();
            $data = MataPelajaran::where('status_id',$id_status)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <a href="'.route('admin.status.mata-pelajaran.edit', [$row->status_id, $row->id]).'" class="edit btn btn-outline-info btn-sm mx-1"><i class="fa fa-edit"></i> Edit</a> 
                        <a href="#" onclick="deleteData()" data-value="'.$row->id.'" data-nama="'.$row->nama.'" class="delete btn btn-outline-danger btn-sm mx-1"><i class="fa fa-trash"></i> Hapus</a>
                        <form id="delete-data-'.$row->id.'" action="'.route('admin.status.mata-pelajaran.destroy', [$row->status_id, $row->id]).'" method="POST" class="d-none">
                            '.csrf_field().method_field('DELETE').'
                        </form>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
    }

    public function store(MataPelajaranPostRequest $request, $id_status)
    {
        try
        {
            $status = Status::where([['id',$id_status],['tipe',1]])->firstOrFail();
            $validated = $request->validated();
            
            $mataPelajaran              = new MataPelajaran();
            $mataPelajaran->status_id   = $status->id;
            $mataPelajaran->nama        = $request->nama;
            $mataPelajaran->save();
    
            return back()->with('success', $mataPelajaran->nama . ' berhasil ditambahkan.');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data gagal ditambahkan.');
        }
    }
    
    public function edit($id_status, $id)
    {
        $status = Status::where([['id',$id_status],['tipe',1]])->firstOrFail();
        $mataPelajaran = MataPelajaran::where([['status_id',$id_status],['id',$id]])->firstOrFail();

        return view('admin.master-data.status.mata-pelajaran.edit', compact('mataPelajaran','status'));
    }
    
    public function update(MataPelajaranPostRequest $request, $id_status, $id)
    {
        try
        {
            $status = Status::where([['id',$id_status],['tipe',1]])->firstOrFail();
            $validated = $request->validated();
    
            $mataPelajaran          = MataPelajaran::where([['status_id',$id_status],['id',$id]])->firstOrFail();
            $mataPelajaran->nama    = $request->nama;
            $mataPelajaran->update();
    
            return back()->with('success', $mataPelajaran->nama . ' berhasil diubah.');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data gagal diubah.');
        }
    }
    
    public function destroy($id_status, $id)
    {
        try
        {
            $status = Status::where([['id',$id_status],['tipe',1]])->firstOrFail();
            $mataPelajaran = MataPelajaran::where([['status_id',$id_status],['id',$id]])->firstOrFail();
            $nama_mataPelajaran = $mataPelajaran->nama;
            $mataPelajaran->delete();
    
            return redirect()->route('admin.status.mata-pelajaran.index', $id_status)->with('success', $nama_mataPelajaran . ' berhasil dihapus!');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data tidak bisa dihapus karena berelasi dengan tabel/data lain.');
        }
    }
}
