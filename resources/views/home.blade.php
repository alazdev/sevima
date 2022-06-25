@extends('layouts.app')

@section('content')
<div class="col-xl-12 pa-0">
    <div class="faq-search-wrap bg-red-light-2">
        <div class="container-fluid">
            <h1 class="display-5 text-white mb-20">Cari modul/mata pelajaran dengan mengetik kata kunci pada kolom pencarian</h1>
            <div class="form-group w-100 mb-0">
                <form action="{{route('home')}}" method="GET">
                    <div class="input-group">
                        <input class="form-control col-12 form-control-lg filled-input bg-white" name="cari" placeholder="Cari kata kunci..." type="text">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text"><span class="feather-icon"><i data-feather="arrow-right"></i></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="faq-content container mt-sm-60 mt-30">
        <div class="hk-row">
            @if($moduls->count() < 1)
                <p class="text-center col-12">Tidak ada hasil yang ditemukan</p>
            @endif
            @foreach($moduls as $modul)
            <div class="col-md-4">
                <div class="card card-profile-feed">
                    <div class="card-header card-header-action">
                        <div class="media align-items-center">
                            <div class="media-img-wrap d-flex mr-10">
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('asset-admin/dist/img/avatar2.jpg')}}" alt="{{$modul->user->name}}" class="avatar-img rounded-circle">
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="text-capitalize font-weight-500 text-dark">{{$modul->user->name}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-30">{{$modul->judul}}</p>
                        <div class="card">
                            <div class="position-relative">
                                <img class="card-img-top d-block" src="/storage/image/modul/sampul/{{$modul->sampul}}" alt="Sampul {{$modul->judul}}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer justify-content-between">
                        <div></div>
                        <div>
                            <a href="{{route('siswa.ambil-modul', $modul->id)}}" class="btn btn-sm btn-primary text-white">Ambil Modul</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
