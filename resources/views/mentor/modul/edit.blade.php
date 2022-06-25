@extends('layouts.app')

@section('title', '| Edit Modul')

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{route('mentor.modul.index')}}">Modul</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h4 class="hk-pg-title font-weight-600 mb-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="file-text"></i></span></span>Edit Modul</h4>
            </div>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card col-12">
                    <div class="card-body form">
                        <form method="POST" action="{{route('mentor.modul.update', $modul->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama*</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Kategori..." required value="{{$modul->judul}}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-outline-info float-right"><i class="fa fa-pencil"></i> Ubah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->
@endsection