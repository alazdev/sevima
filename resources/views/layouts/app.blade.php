<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SuperKlas') }} @yield('title')</title>
    <meta name="description" content="SuperKlas adalah aplikasi yang memudahkan baik pelajar SD, SMP, SMA, MahaSiswa, maupun karyawan siap kerja atau yang sedang bekerja untuk menambah dan mengasah ilmu." />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('asset-admin/favicon.ico') }}">
    <link rel="icon" href="{{ asset('asset-admin/favicon.ico') }}" type="image/x-icon">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('asset-admin/vendors/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />

    <!-- Toastr CSS -->
    <link href="{{ asset('asset-admin/vendors/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Toggles CSS -->
    <link href="{{ asset('asset-admin/vendors/jquery-toggles/css/toggles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('asset-admin/vendors/jquery-toggles/css/themes/toggles-light.css') }}" rel="stylesheet" type="text/css">

    <!-- Yield -->
    @yield('head')

    <!-- Custom CSS -->
    <link href="{{ asset('asset-admin/dist/css/style.css') }}" rel="stylesheet" type="text/css">

    <style>
        .nowrap
        {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    @yield('modal')
    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-alt-nav hk-icon-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt">
            <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse"
                data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false"
                aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand text-red" href="{{url('/')}}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Beranda</a>
                    </li>
                    @auth
                        @if(auth()->User()->level == 1 || auth()->User()->level == 2)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.index')}}">Dasbor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.modul.index')}}">Modul</a>
                            </li>
                            <li class="nav-item dropdown show-on-hover">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Data Pengguna
                                </a>
                                <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <a class="dropdown-item" href="{{route('admin.admin.index')}}">Admin</a>
                                    <a class="dropdown-item" href="{{route('admin.mentor.index')}}">Mentor</a>
                                    <a class="dropdown-item" href="{{route('admin.siswa.index')}}">Siswa</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown show-on-hover">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Master data
                                </a>
                                <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <a class="dropdown-item" href="{{route('admin.status.index')}}">Jenjang Sekolah</a>
                                    <a class="dropdown-item" href="{{route('admin.kategori.index')}}">Kategori Kelas Mahasiswa/Pekerja</a>
                                </div>
                            </li>
                        @elseif(auth()->User()->level == 2)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.index')}}">Dasbor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.modul.index')}}">Modul</a>
                            </li>
                        @elseif(auth()->User()->level == 3)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('mentor.modul.index')}}">Modul</a>
                            </li>
                        @elseif(auth()->User()->level == 4)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('siswa.ambil-modul.index')}}">Modul Diambil</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
            <ul class="navbar-nav hk-navbar-content">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                        </li>
                    @endif

                @else
                @if(auth()->User()->level <= 2)
                <li class="nav-item dropdown dropdown-notifications">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><span class="feather-icon"><i
                                data-feather="bell"></i></span><span class="badge-wrap"><span
                                class="badge badge-success badge-indicator badge-indicator-sm badge-pill pulse"></span></span></a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="fadeIn"
                        data-dropdown-out="fadeOut">
                        <h6 class="dropdown-header">Notifications <a href="javascript:void(0);" class="">View all</a>
                        </h6>
                        <div class="notifications-nicescroll-bar">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <img src="{{ asset('asset-admin/dist/img/avatar1.jpg') }}" alt="user"
                                                class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text"><span class="text-dark text-capitalize">Evie
                                                    Ono</span> accepted your invitation to join the team</div>
                                            <div class="notifications-time">12m</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <img src="{{ asset('asset-admin/dist/img/avatar2.jpg') }}" alt="user"
                                                class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text">New message received from <span
                                                    class="text-dark text-capitalize">Misuko Heid</span></div>
                                            <div class="notifications-time">1h</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-primary rounded-circle">
                                                <span class="initial-wrap"><span><i
                                                            class="zmdi zmdi-account font-18"></i></span></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text">You have a follow up with<span
                                                    class="text-dark text-capitalize"> Scrooge head</span> on <span
                                                    class="text-dark text-capitalize">friday, dec 19</span> at <span
                                                    class="text-dark">10.00 am</span></div>
                                            <div class="notifications-time">2d</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-success rounded-circle">
                                                <span class="initial-wrap"><span>A</span></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text">Application of <span
                                                    class="text-dark text-capitalize">Sarah Williams</span> is waiting
                                                for your approval</div>
                                            <div class="notifications-time">1w</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-warning rounded-circle">
                                                <span class="initial-wrap"><span><i
                                                            class="zmdi zmdi-notifications font-18"></i></span></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text">Last 2 days left for the project</div>
                                            <div class="notifications-time">15d</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                @endif
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="{{ asset('asset-admin/dist/img/avatar5.jpg') }}" alt="user" class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>{{ Auth::user()->name }}<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX"
                        data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="profile.html"><i class="dropdown-icon zmdi zmdi-account"></i><span>Profil</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="dropdown-icon zmdi zmdi-power"></i>
                            <span>Keluar</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </nav>
        <!-- /Top Navbar -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                @yield('content')
            </div>
            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Template by<a href="https://hencework.com/" class="text-dark"
                                    target="_blank">Hencework</a> © 2019</p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p class="d-inline-block">Ikuti kami</p>
                            <a href="https://github.com/alazimdev" target="_blank"
                                class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span
                                    class="btn-icon-wrap"><i class="fa fa-github"></i></span></a>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('asset-admin/vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('asset-admin/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('asset-admin/dist/js/jquery.slimscroll.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('asset-admin/dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{ asset('asset-admin/dist/js/feather.min.js') }}"></script>

    <!-- Toggles JavaScript -->
    <script src="{{ asset('asset-admin/vendors/jquery-toggles/toggles.min.js') }}"></script>

    <!-- Toastr JS -->
    <script src="{{ asset('asset-admin/vendors/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
    
    <!-- Init JavaScript -->
    <script src="{{ asset('asset-admin/dist/js/init.js') }}"></script>

    <!-- Sweet Alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Yield -->
    @yield('script')
</body>

</html>