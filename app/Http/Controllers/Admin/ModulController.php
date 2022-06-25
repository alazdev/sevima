<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

use App\Models\Modul;

class ModulController extends Controller
{
    public function index()
    {
        return view('admin.modul.index');
    }
    
    public function data(Request $request)
    {
        if($request->ajax())
        {
            $data = Modul::with('user')->get();
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
                        <a href="'.route('admin.modul.show', $row->id).'" class="edit btn btn-outline-secondary btn-sm mx-1"><i class="fa fa-eye"></i> Lihat</a>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        
    }
    
    public function show($id)
    {
        $modul = Modul::findOrFail($id);

        return view('admin.modul.detail', compact('modul'));
    }
}
