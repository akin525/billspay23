@extends('layouts.sidebar1')
@section('tittle', 'Choose Network')
@section('content')

    <div class="row">
        <div class="widget-stat card bg-primary">
            <div class="card-body  p-4">
                <div class="media">
									<span class="me-3">
										<i class="la la-shopping-cart"></i>
									</span>
                    <div class="media-body text-white">
                        <p class="mb-1 text-white">MTN | AIRTEL | GLO | 9mobile</p>
                        <h3 class="text-white">Network</h3>
                        <div class="progress mb-2 bg-secondary">
                            <div class="progress-bar progress-animated bg-white" style="width: 90%"></div>
                        </div>
                        <small>Excellent Range</small>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <style>
            img {
                max-width: 100%;
                height: auto;
            }
        </style>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary">
                <div class="card-header border-0">
                    <h4 class="heading mb-0 text-white">MTN & GLO</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="sales-bx" onclick="window.location.href='{{route('select', 'mtn')}}'">
                            <img src="{{asset('mtn.png')}}" alt="#" />
                            <h4>MTN DATA</h4>
                            <span>Select</span>
                        </div>
                        <div class="sales-bx" onclick="window.location.href='{{route('select', 'GLO')}}'">
                            <img src="{{asset('glo.jpeg')}}" alt="#" />
                            <h4>GLO DATA</h4>
                            <span>Select</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: #394758!important">
                <div class="card-header border-0">
                    <h4 class="heading mb-0 text-white">AIRTEL & 9MOBILE</h4>
                </div>
                <div class="card-body" >
                    <div class="d-flex justify-content-between">
                        <div class="sales-bx" onclick="window.location.href='{{route('select', 'AIRTEL')}}'">
                            {{--                            <img src="images/analytics/sales.png" alt="">--}}
                            <img src="{{asset('air.jpg')}}" alt="#" />
                            <h4>AIRTEL</h4>
                            <span>Select</span>
                        </div>
                        <div class="sales-bx" onclick="window.location.href='{{route('select', '9MOBILE')}}'">
                            <img src="{{asset('9m.jpg')}}" alt="#" />
                            <h4>9MOBILE</h4>
                            <span>Select</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
