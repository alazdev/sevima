@extends('layouts.app')

@section('title', '| Materi')

@section('head')
    <!-- Data Table CSS -->
    <link href="{{ asset('asset-admin/vendors/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset-admin/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('modal')
    <!-- Modal forms-->
    <div class="modal fade" id="modalTambahData" tabindex="-1" role="dialog" aria-labelledby="modalTambahData" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Formulir Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('mentor.modul.sub-modul.materi.store', [$modul->id,$subModul->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Judul*</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Judul Materi..." required>
                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tipe">Tipe*</label>
                            <select class="form-control @error('tipe') is-invalid @enderror" id="tipe" name="tipe" required>
                                <option value="1">Embed Youtube</option>
                                <option value="2">PDF</option>
                            </select>
                            @error('embed_youtube')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('pdf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group group_embed_youtube">
                            <label for="embed_youtube">Embed Youtube*</label>
                            <input type="text" class="form-control @error('embed_youtube') is-invalid @enderror" id="embed_youtube" name="embed_youtube" placeholder="contoh: https://www.youtube.com/embed/liiinkk" required>
                        </div>
                        <div class="form-group group_pdf">
                            <label for="pdf">PDF*</label>
                            <input type="file" class="form-control @error('pdf') is-invalid @enderror" id="pdf" name="pdf" accept="application/pdf" required>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-outline-info float-right"><i class="fa fa-save"></i> Tambahkan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="{{route('mentor.modul.index')}}">Modul</a></li>
            <li class="breadcrumb-item" aria-current="page">{{$modul->judul}}</li>
            <li class="breadcrumb-item"><a href="{{route('mentor.modul.sub-modul.index', $modul->id)}}">Sub Modul</a></li>
            <li class="breadcrumb-item" aria-current="page">{{$subModul->judul}}</li>
            <li class="breadcrumb-item active" aria-current="page">Materi</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h4 class="hk-pg-title font-weight-600 mb-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="tag"></i></span></span>Materi</h4>
            </div>
            <div class="d-flex">
                <button class="btn btn-sm btn-outline-primary btn-wth-icon icon-wthot-bg mb-15">
                    <span class="icon-label"><i class="fa fa-plus"></i> </span>
                    <span class="btn-text" data-toggle="modal" data-target="#modalTambahData">Tambah Data</span>
                </button>
            </div>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datatables-materi" class="table table-hover w-100 display pb-30">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">Judul</th>
                                            <th>Tipe</th>
                                            <th>Isi</th>
                                            <th data-priority="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th data-priority="1">Judul</th>
                                            <th>Tipe</th>
                                            <th>Isi</th>
                                            <th data-priority="2">Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
    <!-- Data Table JavaScript -->
    <script src="{{ asset('asset-admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>

    <script>
        @if ($errors->any())
            $('#modalTambahData').modal('show');
        @endif
        $(function () {
            $('.group_embed_youtube').show();
            $('.group_pdf').hide();

            $('#embed_youtube').prop('required',true);
            $('#pdf').prop('required',false);
            $('#tipe').change(function () {
                var tipe = $('#tipe').val();
                if (tipe == 1) {
                    $('.group_embed_youtube').show();
                    $('.group_pdf').hide();

                    $('#embed_youtube').prop('required',true);
                    $('#pdf').prop('required',false);
                } else {
                    $('.group_embed_youtube').hide();
                    $('.group_pdf').show();

                    $('#embed_youtube').prop('required',false);
                    $('#pdf').prop('required',true);
                }
            });
            var table = $('#datatables-materi').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    type: "POST",
                    url: "{{ route('mentor.modul.sub-modul.materi.data', [$modul->id,$subModul->id]) }}",
                    data: function (d) {
                        d._token = "{{csrf_token()}}"
                    },
                    error: function (xhr, error, thrown) {
                        console.log(xhr);
                        alert( 'ERROR saat pengumpulan data!' );
                    }
                },
                columns: [
                    {data: 'judul', name: 'judul'},
                    {data: 'tipe', name: 'tipe'},
                    {data: 'isi', name: 'isi'},
                    {
                        data: 'action', 
                        name: 'action',
                        className: 'nowrap text-right',
                        orderable: false, 
                        searchable: false
                    },
                ],
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                ],
                "aaSorting": [],
                language:  {
                    url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/id.json"
                }
            });

        });

        function deleteData()
        {
            var id = $(event.currentTarget).data("value");
            var judul = $(event.currentTarget).data("judul");
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Kamu yakin untuk menghapus materi dengan judul "'+judul+'"?',
                text: "Jika Kamu hapus, data tidak akan bisa dikembalikan lagi!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal",
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $("#delete-data-"+id).submit();
                }
            });
        }
    </script>
@endsection