@extends('admin.layouts.sidebar1')
@section('tittle', 'Credit User')
@section('content')
    <div class="row">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body subscribe">
                            <form id="dataForm">
                                @csrf

                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Enter Receiver's Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Reveiver's Username" required />
                                            <input type="hidden" class="form-control" value="{{rand(111111111, 999999999)}}" name="refid" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Enter Amount </label>
                                            <input type="number" id="amount" name="amount" class="form-control" placeholder="Amount to fund" required/>
                                        </div>
                                    </div>
                                <button type="submit" class="submit-btn">Fund Wallet</button>

                        </form>
                        </div>



                    </div>


                </div>

@endsection
        @section('script')
            <script>
                $(document).ready(function() {
                    $('#dataForm').submit(function(e) {
                        e.preventDefault(); // Prevent the form from submitting traditionally
                        // Get the form data
                        var formData = $(this).serialize();
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'Do you want to fund ' + document.getElementById("username").value + ' ₦' + document.getElementById("amount").value + '?',
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
                                    url: "{{ route('admin/cr') }}",
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


                        // Send the AJAX request
                    });
                });

            </script>

@endsection
