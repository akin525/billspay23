@extends('layouts.sidebar1')
@section('tittle','Dashboard')
@section('content')
    <script src="{{ asset('js/Chart.min.js') }}"></script>
{{--    <script>--}}
    {{--    window.onload = function() {--}}
    {{--        setTimeout(function() {--}}
    {{--            var username = @json(Auth::user()->username);--}}
    {{--            var message = @json($me->message);--}}

    {{--            Swal.fire({--}}
    {{--                title: 'Hi ' + username,--}}
    {{--                html: message,--}}
    {{--                icon: 'info'--}}
    {{--            });--}}
    {{--        }, 1000);--}}
    {{--    };--}}
    {{--</script>--}}
    <div class="row">
        <div class="panel-header   py-3 bubble-shadow" style="background: linear-gradient(to right, #132563,   #132563)!important">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row py-4">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Welcome to Paydow</h2>
                        <div class="card-title text-white" ><span id="greet"><b>{{$greet}} {{Auth::user()->username}}</b></span> </div> <hr>

                    </div>

{{--                    <div class="ml-md-auto py-2 py-md-0">--}}
{{--                        <button type="button" class="btn btn-warning btn-round mr-2" data-toggle="modal" data-target="#fundWalletModal">--}}
{{--                            Fund Wallet--}}
{{--                        </button>--}}


{{--                        <a href="/404/page-not-found-error/page/" class="btn btn-info btn-round text-white" style="visibility:hidden">.</a>--}}

{{--                    </div>--}}
                </div>


            </div>
            <div class="row">
            <div class="col-xl-6  col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
									<span class="me-3 bgl-primary text-primary">
										<!-- <i class="ti-user"></i> -->
										<i class="fa fa-money"></i>
									</span>
                            <div class="media-body">
                                <p class="mb-1">Wallet</p>
                                <h4 class="mb-0">₦{{number_format(intval($wallet['balance'] *1),2)}}</h4>
                                <span class="badge badge-primary">Balance</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="">
            <div class="">
                <div class="col-md-12">

                    <div class="full-height">
                       <b><b>

                                <marquee style="background-color: white; color:#d1026d; padding: 10px; font-size: 15px;;">  MTN SME NOW AVAILABLE @ {{$price->tamount}} PER GB </marquee>

                            </b></b></div><b><b>


                        </b></b>
                </div>

            </div>
        </div>

        <div class="col-4 col-sm-3 col-lg-3">
            <a href="{{route('pick')}}">
                <div class="card">
                    <div class="card-body p-3 text-center">
                             <span style="font-size: 30px;">
                                 <img width="50" src="https://play-lh.googleusercontent.com/Vse_HvYw4_KZsvVf0NXXWBNnwEq0GVsihLw5z9yzc14MY8vuBet4Vl_shjP0EGg0WuU">
                             </span>
                        {{--                            <div class="h6  text-dark">Data</div>--}}
                        <small>Data</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4 col-sm-3 col-lg-3">
            <a href="{{route('airtime')}}">
                <div class="card">
                    <div class="card-body p-3 text-center">
                             <span style="font-size: 30px;">
                                 <img width="50" src="https://cloud.bekonta.com/public/user_dashboard/icons/airtime.svg">
                             </span>
                        <small>Airtime</small>
                        {{--                            <div class="h6  text-dark">Airtime</div>--}}
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4 col-sm-3 col-lg-3">
            <a href="{{url('tv')}}">
                <div class="card">
                    <div class="card-body p-3 text-center">
                             <span style="font-size: 30px;">
                                 <img width="50" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSw-WmPyjVF6CMyYO61o15KbQdyMRR5b9X18w&usqp=CAU">
                             </span>
                        <h6>Tv</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4 col-sm-3 col-lg-3">
            <a href="{{url('electricity')}}">
                <div class="card">
                    <div class="card-body p-3 text-center">
                             <span style="font-size: 30px;">
                                 <img width="50" src="data:image/png;base64,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">
                             </span>
                        <small>Electricity</small>
                        {{--                            <div class="h6 m-2 text-dark">Electricity</div>--}}
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4 col-sm-3 col-lg-3">
            <a href="{{route('transfer')}}">
                <div class="card">
                    <div class="card-body p-3 text-center">
                             <span style="font-size: 30px;">
                                 <img width="50" src="https://cdn.pixabay.com/photo/2018/08/25/21/08/money-3630935_1280.png">
                             </span>
                        <small>Transfer</small>
                        {{--                            <div class="h6 m-2 text-dark">Electricity</div>--}}
                    </div>
                </div>
            </a>
        </div>

{{--        <div class="col-4 col-sm-3 col-lg-3">--}}
{{--            <a href="{{url('giveaway')}}">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body p-3 text-center">--}}
{{--                             <span style="font-size: 30px;">--}}
{{--                                 <img width="50" src="data:image/png;base64,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">--}}
{{--                             </span>--}}
{{--                        <small>Giveaway</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="col-4 col-sm-3 col-lg-3">--}}
{{--            <a href="{{url('waec')}}">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body p-3 text-center">--}}
{{--                             <span style="font-size: 30px;">--}}
{{--                                 <img width="50" src="data:image/jpeg;base64,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">--}}
{{--                             </span>--}}
{{--                        <smalls>Waec</smalls>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="col-4 col-sm-3 col-lg-3">--}}
{{--            <a href="{{url('neco')}}">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body p-3 text-center">--}}
{{--                             <span style="font-size: 30px;">--}}
{{--                                 <img width="50" src="data:image/jpeg;base64,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">--}}
{{--                             </span>--}}
{{--                        <small>Neco</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
        <div class="col-xl-6  col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
									<span class="me-3 bgl-warning text-warning">
                                        <i class="fa fa-money"></i>
									</span>
                        <div class="media-body">
                            <p class="mb-1">Deposit</p>
                            <h4 class="mb-0">₦{{number_format(intval($tdepo *1),2)}}</h4>
                            <span class="badge badge-warning">Total</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3  col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body  p-4">
                    <div class="media ai-icon">
									<span class="me-3 bgl-danger text-danger">
                                        <i class="fa fa-money"></i>
									</span>
                        <div class="media-body">
                            <p class="mb-1">Bills</p>
                            <h4 class="mb-0">₦{{number_format(intval($tbill *1),2)}}</h4>
                            <span class="badge badge-danger">Total</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3  col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
									<span class="me-3 bgl-success text-success">
                                        <i class="fa fa-money"></i>
									</span>
                        <div class="media-body">
                            <p class="mb-1">Cashback</p>
                            <h4 class="mb-0">₦{{number_format(intval($wallet['bonus'] *1),2)}}</h4>
                            <span class="badge badge-success">Bonus</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <hr>
{{--        <div class="col-lg-6 col-sm-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h4 class="card-title">Deposit Chart</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <canvas id="transactionChart" class="flot-chart"></canvas>--}}
{{--                    <div id="transactionChart" class="flot-chart"></div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-6 col-sm-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h4 class="card-title">Purchase Chart</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <canvas id="transactionChart1" class="flot-chart"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="col-xl-4 col-lg-12 col-sm-12">
            <div class="card overflow-hidden">
                <div class="text-center  overlay-box" style="background-image: url(images/big/img5.jpg);">
                    <img src="{{asset('pro.png')}}" width="100" class="img-fluid rounded-circle" alt="">
                    <h3 class="mt-3 mb-0 text-white">{{Auth::user()->name}}</h3>
                </div>
                <div class="card-body">
                    @if(Auth::user()->parentData->bank==null)
                        <center>
                            <a href="{{route('virtual')}}" class="btn btn-primary text-center">Generate Account Number</a>
                        </center>
                    @else
                        <div class="basic-list-group">
                            <div class="list-group"><a href="javascript:void(0);" class="list-group-item list-group-item-action active">Account
                                    Number </a><a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                    {{Auth::user()->parentData->account_number}}</a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action disabled">
                                    Account Name
                                </a> <a href="javascript:void(0);" class="list-group-item list-group-item-action">{{Auth::user()->parentData->account_name}}</a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action active">
                                    Bank
                                </a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action">{{Auth::user()->parentData->bank}}</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>

        <div class="col-xl-8 col-xxl-8 col-lg-12 col-sm-12">
            <div  class="card">
                <div class="card-body">
                    <h3><b>Activities</b></h3>
                    <div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1  my-4 px-4">
                        <ul class="timeline">
                            @foreach($trans as $net)
                                <li>
                                    <div class="timeline-badge primary"></div>
                                    <a class="timeline-panel" href="#">
                                        <span>{{$net['created_at']}}</span>
                                        <h6 class="mb-0">{{$net['activities']}}</h6>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {


            // Send the AJAX request
            $('#dataForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get the form data
                var formData = $(this).serialize();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to buy airtime of ₦' + document.getElementById("amount").value + ' on ' + document.getElementById("number").value +' ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // The user clicked "Yes", proceed with the action
                        // Add your jQuery code here
                        // For example, perform an AJAX request or update the page content
                        $('#loadingSpinner').show();

                        $.ajax({
                            url: "{{ route('buyairtime') }}",
                            type: 'POST',
                            data: formData,
                            success: function(response) {
                                // Handle the success response here
                                $('#loadingSpinner').hide();

                                console.log(response);
                                // Update the page or perform any other actions based on the response

                                if (response.status == 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: response.message
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Pending',
                                        text: response.message
                                    });
                                    // Handle any other response status
                                }

                            },
                            error: function(xhr) {
                                $('#loadingSpinner').hide();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'fail',
                                    text: xhr.responseText
                                });
                                // Handle any errors
                                console.log(xhr.responseText);

                            }
                        });

                    }
                });
            });
        });

    </script>
    <script>
        var ctx = document.getElementById('transactionAreaChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($dates) !!},
                datasets: [{
                    label: 'Transaction Amount',
                    data: {!! json_encode($amounts) !!},
                    backgroundColor: 'rgba(250,189,6,0.95)',
                    borderColor: 'rgb(114,222,12)',
                    borderWidth: 1,
                    fill: 'origin' // To fill the area below the line
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'time', // Assuming transaction_date is a date field
                        time: {
                            unit: 'day' // Display by day
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        fetch('/transaction')
            .then(response => response.json())
            .then(data => {
                var ctx = document.getElementById('transactionChart').getContext('2d');

                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.dates,
                        datasets: [{
                            label: 'Deposit Amount',
                            data: data.amounts,
                            backgroundColor: 'rgb(33,114,11)',
                            borderColor: 'rgb(33,114,11)',
                            borderWidth: 1,
                            fill: 'origin' // Fill the area below the line

                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
    <script>
        fetch('/transaction1')
            .then(response => response.json())
            .then(data => {
                var ctx = document.getElementById('transactionChart1').getContext('2d');

                var chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.dates,
                        datasets: [{
                            label: 'Purchase Charts',
                            data: data.amounts,
                            backgroundColor: 'rgba(211,161,11,0.95)',
                            borderColor: 'rgba(211,161,11,0.95)',
                            borderWidth: 1,
                            fill: 'origin' // Fill the area below the line

                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
@endsection
