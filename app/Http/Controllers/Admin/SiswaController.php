<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

use App\Models\User;

class SiswaController extends Controller
{
    public function index()
    {
        return view('admin.pengguna.siswa.index');
    }
    
    public function data(Request $request)
    {
        if($request->ajax())
        {
            $data = User::with('siswa')->where('level', 4)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <a href="'.route('admin.siswa.show', $row->id).'" class="show btn btn-outline-secondary btn-sm mx-1"><i class="fa fa-eye"></i> Lihat</a>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    public function show($id)
    {
        $siswa = User::where([['id',$id],['level',4]])->firstOrFail();

        return view('admin.pengguna.siswa.detail', compact('siswa'));
    }
}
