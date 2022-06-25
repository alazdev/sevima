@extends('layouts.app')

@section('title', '| Dasbor')

@section('content')
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Selamat datang di {{ config('app.name', 'Laravel') }}</h2>
                <p>Berikut adalah rekap beberapa tabel dalam bentuk data.</p>
            </div>
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-lg-4">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="hk-legend-wrap mb-10">
                                    <div class="hk-legend">
                                        <span
                                            class="d-10 bg-red-light-4 rounded-circle d-inline-block"></span><span>Admin</span>
                                    </div>
                                    <div class="hk-legend">
                                        <span
                                            class="d-10 bg-red-light-2 rounded-circle d-inline-block"></span><span>Mentor</span>
                                    </div>
                                    <div class="hk-legend">
                                        <span
                                            class="d-10 bg-red rounded-circle d-inline-block"></span><span>Siswa</span>
                                    </div>
                                </div>
                                <div id="e_chart_1" class="echart" style="height:155px;"></div>
                                <div class="row mt-20">
                                    <div class="col-4">
                                        <span class="d-block text-capitalize">Admin</span>
                                        <span class="d-block font-weight-600 font-13 pie-chart-load persentase-admin">sedang memuat...</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="d-block text-capitalize">Mentor</span>
                                        <span class="d-block font-weight-600 font-13 pie-chart-load persentase-mentor">sedang memuat...</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="d-block text-capitalize">Siswa</span>
                                        <span class="d-block font-weight-600 font-13 pie-chart-load persentase-siswa">sedang memuat...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="hk-row">
                            <div class="col-lg-4">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Jumlah Admin</span>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <div>
                                                <span class="d-block">
                                                    <span class="display-5 font-weight-400 text-dark widget-load jumlah-admin">sedang memuat...</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Jumlah Mentor</span>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <div>
                                                <span class="d-block">
                                                    <span class="display-5 font-weight-400 text-dark widget-load jumlah-mentor">sedang memuat...</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Jumlah Siswa</span>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <div>
                                                <span class="d-block">
                                                    <span class="display-5 font-weight-400 text-dark widget-load jumlah-siswa">sedang memuat...</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hk-row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-action">
                                        <h6>Total Pengguna</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="e_chart_2" class="echart" style="height:190px;"></div>
                                        <div class="hk-legend-wrap mt-10">
                                            <div class="hk-legend">
                                                <span class="d-10 bg-red rounded-circle d-inline-block"></span><span>Pengguna</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
@endsection

@section('script')
    <!-- Counter Animation JavaScript -->
    <script src="{{ asset('asset-admin/vendors/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <!-- Easy pie chart JS -->
    <script src="{{ asset('asset-admin/vendors/easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>

    <!-- Sparkline JavaScript -->
    <script src="{{ asset('asset-admin/vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('asset-admin/vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/morris.js/morris.min.js') }}"></script>

    <!-- EChartJS JavaScript -->
    <script src="{{ asset('asset-admin/vendors/echarts/dist/echarts-en.min.js') }}"></script>

    <!-- Peity JavaScript -->
    <script src="{{ asset('asset-admin/vendors/peity/jquery.peity.min.js') }}"></script>

    <script>
        function drawPieChart(admin, mentor, siswa)
        {
            var eChart_1 = echarts.init(document.getElementById('e_chart_1'));
            var option = {
                tooltip: {
                    show: true,
                    backgroundColor: '#fff',
                    borderRadius:6,
                    padding:6,
                    axisPointer:{
                        lineStyle:{
                            width:0,
                        }
                    },
                    textStyle: {
                        color: '#324148',
                        fontFamily: '"Poppins", sans-serif',
                        fontSize: 12
                    }	
                },
                series: [
                    {
                        type: 'pie',
                        selectedMode: 'single',
                        radius: ['80%', '40%'],
                        labelLine: {
                            normal: {
                                show: false
                            }
                        },
                        color: ['#f83f37', '#fa7d77', '#fdc5c3'],
                        data:[
                            {value:siswa, name:''},
                            {value:mentor, name:''},
                            {value:admin, name:''},
                        ]
                    }
                ]
            };
            eChart_1.setOption(option);
            eChart_1.resize();
        }

        function drawBarChart(data, title)
        {
            var eChart_2 = echarts.init(document.getElementById('e_chart_2'));
            var markLineData = [];
            for (var i = 1; i < data.length; i++) {
                markLineData.push([{
                    xAxis: i - 1,
                    yAxis: data[i - 1],
                    value: (data[i] + data[i-1]).toFixed(2)
                }, {
                    xAxis: i,
                    yAxis: data[i]
                }]);
            }

            //option
            var option2 = {
                color: ['#f83f37','#fdc5c3'],
                tooltip: {
                    show: true,
                    trigger: 'axis',
                    backgroundColor: '#fff',
                    borderRadius:6,
                    padding:6,
                    axisPointer:{
                        lineStyle:{
                            width:0,
                        }
                    },
                    textStyle: {
                        color: '#324148',
                        fontFamily: '"Poppins", sans-serif;',
                        fontSize: 12
                    }	
                },
                
                grid: {
                    top: '3%',
                    left: '3%',
                    right: '3%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis : [
                    {
                        type : 'category',
                        data: title,
                        axisLine: {
                            show:false
                        },
                        axisTick: {
                            show:false
                        },
                        axisLabel: {
                            textStyle: {
                                color: '#6f7a7f'
                            }
                        }
                    }
                ],
                yAxis : [
                    {
                        type : 'value',
                        axisLine: {
                            show:false
                        },
                        axisTick: {
                            show:false
                        },
                        axisLabel: {
                            textStyle: {
                                color: '#6f7a7f'
                            }
                        },
                        splitLine: {
                            lineStyle: {
                                color: 'transparent',
                            }
                        }
                    }
                ],
                
                series: [
                    {
                        data:data,
                        type: 'bar',
                        barMaxWidth: 30,
                    }
                    // ,
                    // {
                    //     data: [120, 152, 251, 124, 250, 120, 110],
                    //     type: 'bar',
                    //     barMaxWidth: 30,
                    // }
                ]
            };
            eChart_2.setOption(option2);
            eChart_2.resize();
        }

        $('#dash-tab a').on('click', function (e) {
            clearTimeout(echartResize);
            echartResize = setTimeout(echartsConfig, 200);
        })
        
        $.ajax({
            type: "GET",
            url: "{{ route('admin.data.pie-chart') }}",
            beforeSend: function()
            {
                $('.pie-chart-load').text('sedang memuat...');
            },
            success: function(data)
            {
                drawPieChart(data.admin, data.mentor, data.siswa);
                $('.persentase-admin').text(data.persentaseAdmin+'%');
                $('.persentase-mentor').text(data.persentaseMentor+'%');
                $('.persentase-siswa').text(data.persentaseSiswa+'%');
            },
            error: function(xhr, status, error)
            {
                drawPieChart(0,0);
                $('.pie-chart-load').text('gagal memuat...');
                $('.pie-chart-load').addClass('text-danger');
            }
        });

        $.ajax({
            type: "GET",
            url: "{{ route('admin.data.widget') }}",
            beforeSend: function()
            {
                $('.widget-load').text('sedang memuat...');
            },
            success: function(data)
            {
                $('.jumlah-admin').text(data.admin);
                $('.jumlah-mentor').text(data.mentor);
                $('.jumlah-siswa').text(data.siswa);
            },
            error: function(xhr, status, error)
            {
                drawPieChart(0,0);
                $('.widget-load').text('gagal memuat...');
                $('.widget-load').addClass('text-danger');
            }
        });

        
        $.ajax({
            type: "GET",
            url: "{{ route('admin.data.bar-chart') }}",
            beforeSend: function()
            {
                drawBarChart([0],['sedang memuat...']);
            },
            success: function(data)
            {
                drawBarChart(data.data, data.tanggal);
                console.log(data);
            },
            error: function(xhr, status, error)
            {
                drawBarChart([0],['gagal memuat...']);
                //
            }
        });
    </script>
@endsection