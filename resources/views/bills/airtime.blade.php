@extends('layouts.sidebar1')
@section('tittle', 'Airtime')
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
                        <h3 class="text-white">Buy Airtime</h3>
                        <div class="progress mb-2 bg-secondary">
                            <div class="progress-bar progress-animated bg-white" style="width: 90%"></div>
                        </div>
                        <small>Excellent Range</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <div style="padding:90px 15px 20px 15px">
                        <form id="dataForm" >
                            @csrf
                            <div class="row">
                                <div class="col-sm-8">
                                    <br>
                                    <br>
                                    <div id="AirtimePanel">
                                        <div class="subscribe">
                                            <p>AIRTIME PURCHASE</p>
                                            {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                                            <br/>
                                            <div id="div_id_network" class="form-group">
                                                <label for="network" class=" requiredField">
                                                    Network<span class="asteriskField">*</span>
                                                </label>
                                                <div class="">
                                                    <select name="id" class="text-success form-control" required="">
                                                        <option>Select your network</option>
                                                    @if($server->server == "sammighty")
                                                        <option value="m">MTN</option>
                                                        <option value="g">GLO</option>
                                                        <option value="a">AIRTEL</option>
                                                        <option value="9">9MOBILE</option>
                                                        @elseif($server->server =="easyaccess")
                                                            <option value="01">MTN</option>
                                                            <option value="02">GLO</option>
                                                            <option value="03">AIRTEL</option>
                                                            <option value="04">9MOBILE</option>
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                            <br/>
                                            <div id="div_id_network" >
                                                <label for="network" class=" requiredField">
                                                    Enter Amount<span class="asteriskField">*</span>
                                                </label>
                                                <div class="">
                                                    <input type="number" id="amount" name="amount" min="50" max="4000" class="text-success form-control" required>
                                                </div>
                                            </div>
                                            <br/>
                                            <div id="div_id_network" class="form-group">
                                                <label for="network" class=" requiredField">
                                                    Enter Phone Number<span class="asteriskField">*</span>
                                                </label>
                                                <div class="">
                                                    <input type="number" id="number" name="number" minlength="11" class="text-success form-control" required>
                                                </div>
                                            </div>
                                            <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                                            <button type="submit" class="submit-btn" >PURCHASE</button>
                                        </div>


                                        {{--                    <button type="submit" class=" btn btn-success" style="color: white;background-color: #28a745" id="warning"> Purchase Now<span class="load loading"></span></button>--}}
                                        <script>
                                            const btns = document.querySelectorAll('button');
                                            btns.forEach((items)=>{
                                                items.addEventListener('click',(evt)=>{
                                                    evt.target.classList.add('activeLoading');
                                                })
                                            })
                                        </script>
                                    </div>


                                </div>
                                <div class="col-sm-4">
                                    <br/>
                                    <br/>
                                    <div class="card bg-primary">



                                        {{--                                            <div class="d-flex justify-content-between">--}}
{{--                                                <div class="sales-bx">--}}
{{--                                                    <i class="fa fa-wallet text-yellow" style="font-size: 40px;"></i>--}}
{{--                                                    <h4>₦{{number_format(intval(Auth::user()->parentData->balance *1),2)}}</h4>--}}
{{--                                                    <span>Balance</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="sales-bx">--}}
{{--                                                    <i class="fa fa-wallet text-yellow" style="font-size: 40px"></i>--}}
{{--                                                    <h4>₦{{number_format(intval(Auth::user()->parentData->bonus *1),2)}}</h4>--}}
{{--                                                    <span>Bonus</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <ul class="list-group ">
                                                <b><li class="list-group-item list-group-item-primary text-white"> MTN *310#</li></b>
                                                <b><li class="list-group-item list-group-item-success text-white">MTN [CG] *131*4# or *460*260#</li></b>
                                                <b><li class="list-group-item list-group-item-action text-white">9mobile  *223#</li></b>
                                                <b><li class="list-group-item list-group-item-info text-white">Airtel *123#</li></b>
                                                <b><li class="list-group-item list-group-item-secondary text-white">Glo *124*0#</li></b>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </form>


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
                                    }).then(() => {
                                        location.reload(); // Reload the page
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

@endsection
