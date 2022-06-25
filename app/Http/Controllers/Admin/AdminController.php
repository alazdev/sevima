<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DataTables;
use App\Http\Requests\UserPostRequest;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pengguna.admin.index');
    }
    
    public function data(Request $request)
    {
        if($request->ajax())
        {
            $data = User::where('level', 2)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <a href="#" onclick="resetPasswordData()" data-value="'.$row->id.'" data-nama="'.$row->name.'" class="reset-password btn btn-outline-info btn-sm mx-1"><i class="fa fa-cog"></i> Atur Ulang Sandi</a> 
                        <form id="reset-password-data-'.$row->id.'" action="'.route('admin.admin.reset-password', $row->id).'" method="POST" class="d-none">
                            '.csrf_field().method_field('PUT').'
                        </form>
                        <a href="#" onclick="deleteData()" data-value="'.$row->id.'" data-nama="'.$row->name.'" class="delete btn btn-outline-danger btn-sm mx-1"><i class="fa fa-trash"></i> Hapus</a>
                        <form id="delete-data-'.$row->id.'" action="'.route('admin.admin.destroy', $row->id).'" method="POST" class="d-none">
                            '.csrf_field().method_field('DELETE').'
                        </form>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
    }

    public function store(UserPostRequest $request)
    {
        try
        {
            $validated = $request->validated();

            $admin              = new User();
            $admin->name        = $request->name;
            $admin->email       = $request->email;
            $admin->password    = Hash::make('Secret123');
            $admin->level       = 2;
            $admin->save();
    
            return back()->with('success', $admin->name . ' berhasil ditambahkan.');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data gagal ditambahkan.');
        }
    }
    
    public function resetPassword(Request $request, $id)
    {
        try
        {
            $admin              = User::where([['id',$id],['level',2]])->firstOrFail();
            $admin->password    = Hash::make('Secret123');
            $admin->update();
    
            return back()->with('success', 'Berhasil mengatur ulang kata sandi ' . $admin->name . ' menjadi "Secret123".');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Kata sandi gagal diatur ulang.');
        }
    }
    
    public function destroy($id)
    {
        $admin = User::where([['id',$id],['level',2]])->firstOrFail();
        $admin_name = $admin->name;
        $admin->delete();
        return redirect()->route('admin.admin.index')->with('success', $admin_name . ' berhasil dihapus!');
    }
}
