<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use DataTables;
use App\Http\Requests\MentorPostRequest;

use App\Models\User;
use App\Models\Mentor;

class MentorController extends Controller
{
    public function index()
    {
        return view('admin.pengguna.mentor.index');
    }
    
    public function data(Request $request)
    {
        if($request->ajax())
        {
            $data = User::with('mentor')->where('level', 3)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <a href="'.route('admin.mentor.show', $row->id).'" class="show btn btn-outline-secondary btn-sm mx-1"><i class="fa fa-eye"></i> Lihat</a>
                        <a href="#" onclick="resetPasswordData()" data-value="'.$row->id.'" data-nama="'.$row->name.'" class="reset-password btn btn-outline-info btn-sm mx-1"><i class="fa fa-cog"></i> Atur Ulang Sandi</a> 
                        <form id="reset-password-data-'.$row->id.'" action="'.route('admin.mentor.reset-password', $row->id).'" method="POST" class="d-none">
                            '.csrf_field().method_field('PUT').'
                        </form>
                        <a href="#" onclick="deleteData()" data-value="'.$row->id.'" data-nama="'.$row->name.'" class="delete btn btn-outline-danger btn-sm mx-1"><i class="fa fa-trash"></i> Hapus</a>
                        <form id="delete-data-'.$row->id.'" action="'.route('admin.mentor.destroy', $row->id).'" method="POST" class="d-none">
                            '.csrf_field().method_field('DELETE').'
                        </form>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(MentorPostRequest $request)
    {
        try
        {
            $validated = $request->validated();

            $user              = new User();
            $user->name        = $request->name;
            $user->email       = $request->email;
            $user->password    = Hash::make('Secret123');
            $user->level       = 3;
            $user->save();

            $mentor             = new Mentor();
            $mentor->user_id    = $user->id;
            if($request->foto != null){
                $foto = $request->file('foto')->store('public/image/foto/mentor');
            }
            $mentor->foto       = $request->foto != null ? $request->file('foto')->hashName() : NULL;
            $mentor->profesi    = $request->profesi;
            $mentor->deskripsi  = $request->deskripsi;
            $mentor->save();
    
            return back()->with('success', $user->name . ' berhasil ditambahkan.');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data gagal ditambahkan.');
        }
    }

    public function show($id)
    {
        $mentor = User::where([['id',$id],['level',3]])->firstOrFail();

        return view('admin.pengguna.mentor.detail', compact('mentor'));
    }
    
    public function resetPassword(Request $request, $id)
    {
        try
        {
            $mentor             = User::where([['id',$id],['level',3]])->firstOrFail();
            $mentor->password   = Hash::make('Secret123');
            $mentor->update();
    
            return back()->with('success', 'Berhasil mengatur ulang kata sandi ' . $mentor->name . ' menjadi "Secret123".');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Kata sandi gagal diatur ulang.');
        }
    }
    
    public function destroy($id)
    {
        $user = User::where([['id',$id],['level',3]])->firstOrFail();
        $user_name = $user->name;
        Storage::delete('public/image/foto/mentor/'.$user->mentor->foto);
        $user->mentor->delete();
        $user->delete();
        return redirect()->route('admin.mentor.index')->with('success', $user_name . ' berhasil dihapus!');
    }
}
