<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Modul;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->cari){
            $moduls = Modul::with('user')->where('judul', 'LIKE', '%'.$request->cari.'%')->limit(30)->get();
        } else {
            $moduls = Modul::with('user')->limit(30)->get();
        }
        return view('home', compact('moduls'));
    }
}
