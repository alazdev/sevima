@extends('layouts.app')

@section('title', '| Detail Modul')

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{route('admin.modul.index')}}">Modul</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Modul</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h4 class="hk-pg-title font-weight-600 mb-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="file"></i></span></span>Detail Modul</h4>
                <p>Detail Modul {{$modul->judul}}.</p>
            </div>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{url('storage/image/modul/sampul/'.$modul->sampul)}}" class="img-fluid" alt="Sampul {{$modul->judul}}">
                            <div class="card card-profile-feed">
                                <div class="card-header card-header-action">
                                    <div class="media align-items-center">
                                        <div class="media-img-wrap d-flex mr-10">
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset('asset-admin/dist/img/avatar7.jpg')}}" alt="user" class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="text-capitalize font-weight-500 text-dark">{{$modul->user->name}}</div>
                                            <div class="font-13">{{$modul->user->mentor->profesi}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>{{$modul->user->mentor->deskripsi}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="col-sm">
                                <div class="accordion" id="accordion_1">
                                    @foreach($modul->subModuls()->get() as $data)
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_{{$data->id}}" aria-expanded="false">{{$data->judul}}</a>
                                            </div>
                                            <div id="collapse_{{$data->id}}" class="collapse" data-parent="#accordion_1">
                                                @foreach($data->materis()->get() as $materi)
                                                    <div class="card-body ml-4 pa-15"> @if($materi->tipe == 1) <i class="fa fa-play-circle-o"></i> <a href="{{$materi->isi}}" target="_blank"> {{$materi->judul}} </a> @else <i class="fa fa-file-pdf-o"></i> <a href="{{url('/storage/pdf/materi').'/'.$materi->isi}}" target="_blank"> {{$materi->judul}} </a> @endif </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->
@endsection

@section('script')

@endsection