@extends('layouts.app')

@section('title', '| Siswa')

@section('head')
    <!-- Data Table CSS -->
    <link href="{{ asset('asset-admin/vendors/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset-admin/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item active" aria-current="page">Siswa</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h4 class="hk-pg-title font-weight-600 mb-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Siswa</h4>
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
                                <table id="datatables-siswa" class="table table-hover w-100 display pb-30">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">Nama</th>
                                            <th>Email</th>
                                            <th>Email Orang Tua</th>
                                            <th data-priority="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th data-priority="1">Nama</th>
                                            <th>Email</th>
                                            <th>Email Orang Tua</th>
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
            var table = $('#datatables-siswa').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    type: "POST",
                    url: "{{ route('admin.siswa.data') }}",
                    data: function (d) {
                        d._token = "{{csrf_token()}}"
                    },
                    error: function (xhr, error, thrown) {
                        console.log(xhr);
                        alert( 'ERROR saat pengumpulan data!' );
                    }
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'siswa.email_orang_tua', name: 'email_orang_tua'},
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
    </script>
@endsection