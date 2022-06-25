<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

use App\Http\Requests\KategoriPostRequest;

use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        return view('admin.master-data.kategori.index');
    }
    
    public function data(Request $request)
    {
        if($request->ajax())
        {
            $data = Kategori::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <a href="'.route('admin.kategori.show', $row->id).'" class="show btn btn-outline-secondary btn-sm mx-1"><i class="fa fa-eye"></i> Lihat</a> 
                        <a href="'.route('admin.kategori.edit', $row->id).'" class="edit btn btn-outline-info btn-sm mx-1"><i class="fa fa-edit"></i> Edit</a> 
                        <a href="#" onclick="deleteData()" data-value="'.$row->id.'" data-nama="'.$row->nama.'" class="delete btn btn-outline-danger btn-sm mx-1"><i class="fa fa-trash"></i> Hapus</a>
                        <form id="delete-data-'.$row->id.'" action="'.route('admin.kategori.destroy', $row->id).'" method="POST" class="d-none">
                            '.csrf_field().method_field('DELETE').'
                        </form>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
    }

    public function store(KategoriPostRequest $request)
    {
        try
        {
            $validated = $request->validated();
            
            $kategori       = new Kategori();
            $kategori->nama = $request->nama;
            $kategori->save();
    
            return back()->with('success', $kategori->nama . ' berhasil ditambahkan.');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data gagal ditambahkan.');
        }
    }
    
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('admin.master-data.kategori.detail', compact('kategori'));
    }
    
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('admin.master-data.kategori.edit', compact('kategori'));
    }
    
    public function update(KategoriPostRequest $request, $id)
    {
        try
        {
            $validated = $request->validated();
    
            $kategori       = Kategori::findOrFail($id);
            $kategori->nama = $request->nama;
            $kategori->update();
    
            return back()->with('success', $kategori->nama . ' berhasil diubah.');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data gagal diubah.');
        }
    }
    
    public function destroy($id)
    {
        try
        {
            $kategori = Kategori::findOrFail($id);
            $nama_kategori = $kategori->nama;
            $kategori->delete();
    
            return redirect()->route('admin.kategori.index')->with('success', $nama_kategori . ' berhasil dihapus!');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Data tidak bisa dihapus karena berelasi dengan tabel/data lain.');
        }
    }
}
