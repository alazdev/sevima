<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
        $status = Status::orderBy('urutan')->get();
        return view('admin.master-data.status.index', compact('status'));
    }
}
