@extends('layouts.app')

@section('title', '| Jenjang Sekolah')

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item active" aria-current="page">Jenjang Sekolah</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h4 class="hk-pg-title font-weight-600 mb-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="tag"></i></span></span>Jenjang Sekolah</h4>
            </div>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <div class="accordion" id="accordion_1">
                                @foreach($status as $data)
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_{{$data->id}}" aria-expanded="false">{{$data->nama}}</a>
                                        </div>
                                        <div id="collapse_{{$data->id}}" class="collapse" data-parent="#accordion_1">
                                            @if($data->tipe == 1)
                                                <div class="card-body pa-15">Data Status Pengguna {{$data->nama}} ini memiliki jenjang kelas dan juga bisa difilter berdasarkan mata pelajaran.</div>
                                                <div class="col-sm">
                                                    <div class="table-wrap">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Nama Kelas</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php($i = 1)
                                                                    @foreach($data->kelases()->orderBy('urutan')->get() as $kelas)
                                                                    <tr>
                                                                        <td>{{$i}}</td>
                                                                        <td>{{$kelas->nama}}</td>
                                                                    </tr>
                                                                    @php($i++)
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col text-center">
                                                    <a href="{{route('admin.status.mata-pelajaran.index', $data->id)}}" class="btn btn-outline-info m-4"><i class="fa fa-cog"> Konfigurasi Mata Pelajaran</i></a>
                                                </div>
                                            @else
                                                <div class="card-body pa-15">Data Status Pengguna ini tidak memiliki jenjang kelas dan bisa difilter berdasarkan kategori di menu `Kategori Kelas Mahasiswa/Pekerja`.</div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
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