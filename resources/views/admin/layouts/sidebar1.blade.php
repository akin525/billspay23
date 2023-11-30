<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PAGE TITLE HERE -->
    <title>@yield('tittle')</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="https://billspay.ashmarkets.com/bills.png">
    <link href="{{asset('style1.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('color_2.css')}}" />
    <link href="{{asset('dashboard/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/vendor/swiper/css/swiper-bundle.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard/cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css')}}">
    <link href="{{asset('dashboard/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet')}}">
    <link href="{{asset('dashboard/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/vendor/dropzone/dist/dropzone.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard/cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css')}}">
    <script src="{{ asset('js/chart.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <!-- site css -->
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />

    <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{asset('css/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/sweet-alert2/sweetalert2.min.css')}}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" />

    <!-- tagify-css -->
    <link href="{{asset('dashboard/vendor/tagify/dist/tagify.css')}}" rel="stylesheet">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- tagify-css -->
    <link href="{{asset('dashboard/vendor/tagify/dist/tagify.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <!-- Style css -->
    <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">

    @yield('style')
</head>
<style>
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loading-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<body class="dashboard dashboard_1">
<div id="loading-wrapper">
    <div class="spinner-border"></div>
    BILLSPAY ADMIN
</div>

<div class="full_container">
    <div class="inner_container">
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <div class="logo_section">
                            <a href="{{route('account')}}"><img class="logo_icon img-responsive" src="{{asset("bills.png")}}" alt="#"></a>
                        </div>
                    </div>
                    <div class="sidebar_user_info">
                        <div class="icon_setting"></div>
                        <div class="user_profle_side">
                                <div class="user_img"><img class="img-responsive" src="{{asset("user_img.jpg")}}" alt="#" /></div>
                            <div class="user_info">
                                <h6> {{ Auth::user()->username }}</h6>
                                <p><span class="online_animation"></span> Admin</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="sidebar_blog_2">
                    <h4>
                        <a href="#" target=”_blank” class="font-weight-bold text-center">
                            <img width="150" src="{{asset('dd.png')}}" alt="">

                        </a>
                    </h4>
                    <ul class="list-unstyled components">
                        <li class="active">
                            <a href="{{ route('admin/dashboard') }}"  ><i class="fa fa-dashboard white_color"></i> <span>Dashboard</span></a>
                        </li>

                        <li>
                            <a href="{{route('admin/bills')}}"><i class="fa fa-sticky-note "></i> <span>All Bills</span></a>
                        </li>
                        <li>
                            <a href="#app2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-book"></i> <span>Server Control</span></a>
                            <ul class="collapse list-unstyled" id="app2">
                                <li><a href="{{ route('admin/air') }}"><i class="fa fa-cab orange_color"></i> <span>Airtime Controller</span></a></li>
                                <li><a href="{{ route('admin/server') }}"><i class="fa fa-cab"></i> <span>Data Controllerr</span></a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="{{route('admin/deposits')}}"><i class="fa fa-money"></i> <span>All Deposit</span></a>
                        </li>
                        <li>
                            <a href="#app2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cart-shopping"></i> <span>Product Controller</span></a>
                            <ul class="collapse list-unstyled" id="app2">
                                <li><a href="{{ route('admin/product2') }}"><i class="fa fa-cart-plus orange_color"></i> <span>Sammighty Product</span></a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="{{route('admin/user')}}"><i class="fa fa-user"></i> <span>All Users</span></a>
                        </li>
                        <li>
                            <a href="{{route('admin/credit')}}"><i class="fa fa-money"></i> <span>Credit User</span></a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="#app7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users"></i> <span>Self Service</span></a>--}}
{{--                            <ul class="collapse list-unstyled" id="app7">--}}
{{--                                <li><a href="{{ url('verifybill') }}"><i class="fa fa-bookmark"></i> <span>Verify Airtime/Data</span></a></li>--}}
{{--                                <li><a href="{{ url('verifydeposit') }}"><i class="fa fa-newspaper-o"></i> <span>Verify Deposit</span></a></li>--}}

{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li><a href="{{ route('fund') }}"><i class="fa fa-credit-card orange_color"></i> <span>Fund Wallet</span></a></li>--}}
{{--                        <li>--}}
{{--                            <a href="#app1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-gift"></i> <span>Giveaway</span></a>--}}
{{--                            <ul class="collapse list-unstyled" id="app1">--}}
{{--                                <li class="active">--}}
{{--                                    <a href="{{ route('bonus') }}"  ><i class="fa fa-gift orange_color"></i> <span>Create Giveaway</span></a>--}}
{{--                                </li>--}}
{{--                                <li class="active">--}}
{{--                                    <a href="{{ route('claim') }}"  ><i class="fa fa-folder-open white_color"></i> <span>Claim Giveaway</span></a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}



                    </ul>
                </div>
            </nav>
            <div id="content">
                <!-- topbar -->
                <div class="topbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                            <div class="logo_section m-1">
                                <a href="{{ route('account') }}"><img class="img-responsive" src="{{asset("bills.png")}}" alt="#" /></a>
                            </div>
                            <br>
                            {{--                        @if(Auth::user()->pin =="0")--}}
                            {{--                            <button type="button" onclick="window.location.href='{{route('createpin')}}'" class="btn btn-success mb-3">Enable Transaction Pin for secure purpose</button>--}}
                            {{--                        @endif--}}
                        </div>

                    </nav>
                </div>

                @include('sweetalert::alert')
                @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])





    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
                <div class="midde_cont">
                    <br/>
                    <br/>
                    <br/>
                @include('sweetalert::alert')
            @yield('content')
                </div>
    <!--**********************************
            Content body end
        ***********************************-->

    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Developed by <a href="#" target="_blank">BILLSPAY</a> 2023</p>
        </div>
    </div>
            </div>
    <!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>

@yield('script')

<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{asset('dashboard/vendor/global/global.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/apexchart/apexchart.js')}}"></script>

<!-- Dashboard 1 -->
<script src="{{asset('dashboard/js/dashboard/analytics.js')}}"></script>

<script src="{{asset('dashboard/vendor/flot/jquery.flot.js')}}"></script>
<script src="{{asset('dashboard/vendor/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('dashboard/vendor/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('dashboard/vendor/flot-spline/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('dashboard/js/plugins-init/flot-init.js')}}"></script>

<!-- Datatable -->
<script src="{{asset('dashboard/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/js/plugins-init/datatables.init.js')}}"></script>


<!-- Dashboard 1 -->
<script src="{{asset('dashboard/js/dashboard/dashboard-1.js')}}"></script>
<script src="{{asset('dashboard/vendor/draggable/draggable.js')}}"></script>
<script src="{{asset('dashboard/vendor/swiper/js/swiper-bundle.min.js')}}"></script>


<!-- tagify -->
<script src="{{asset('dashboard/vendor/tagify/dist/tagify.js')}}"></script>

<script src="{{asset('dashboard/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/datatables/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/datatables/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/datatables/js/jszip.min.js')}}"></script>
<script src="{{asset('dashboard/js/plugins-init/datatables.init.js')}}"></script>


<!-- Apex Chart -->

<script src="{{asset('dashboard/vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
<script src="{{asset('dashboard/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>


<!-- Vectormap -->
<script src="{{asset('dashboard/js/custom.js')}}"></script>
<script src="{{asset('dashboard/js/deznav-init.js')}}"></script>
<script src="{{asset('dashboard/js/demo.js')}}"></script>
<script src="{{asset('dashboard/js/styleSwitcher.js')}}"></script>
    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/sweet-alert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- wow animation -->
    <script src="{{asset('js/animate.js')}}"></script>
    <!-- select country -->
    <script src="{{asset('js/bootstrap-select.js')}}"></script>
    <!-- owl carousel -->
    <script src="{{asset('js/owl.carousel.js')}}"></script>

    <!-- nice scrollbar -->
    <script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/chart_custom_style1.js')}}"></script>
    <script src="{{asset('hp/jquery.min.js')}}"></script>
    <script src="{{asset('hp/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('hp/modernizr.js')}}"></script>
    <script src="{{asset('hp/moment.js')}}"></script>
    <script src="{{asset('hp/main.js')}}"></script>
</body>
