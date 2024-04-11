<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{ asset('assets/js') }}/';</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>


<!-- Selects 2 -->
<script src="{{ asset('assets/select2/select2.min.js')}}"></script>
<script src="{{ asset('assets/select2-bootstrap-theme/select2.js')}}"></script>




<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>



@if (App::getLocale() == 'en')
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/dataTables.bootstrap4.min.js') }}"></script>
@else
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/dataTables.bootstrap4.min.js') }}"></script>
@endif



<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;

        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>



<!-- //-- START on change a Driver get the Customers that belongs to their Driver -->

<script>
        
    $(document).ready(function () {
        $('select[name="driver_id"]').on('change', function () {
            var driver_id = $(this).val();
            if (driver_id) {
                $.ajax({
                    url: "{{ URL::to('Get_customer') }}/" + driver_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="customer_id"]').empty();
                        $('select[name="customer_id"]').append('<option selected disabled >Choose...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="customer_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<!-- //-- End on change a Driver get the Customers that belongs to their Driver -->






<!-- ---------- -- START on change a Customer get the Town Directly that belongs to their Customer ------ -------------- -->
<script>
    $(document).ready(function () {
        $('select[name="customer_id"]').on('change', function () {
            var customer_id = $(this).val();
            if (customer_id) {
                $.ajax({
                    url: "{{ URL::to('Get_town') }}/" + customer_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
						$('#town_id').val(data.town_id);
						$('#town_name').val(data.town_name); // Assuming the town_name is returned along with the town ID
                      
                    },
                    error: function (xhr, status, error) {
                        // console.log(error);
						console.log("XHR Status: " + status);
                        console.log("Error: " + error);
                        console.log(xhr.responseText);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<!-- ---------- -- END on change a Customer get the Town Directly that belongs to their Customer ------ -------------- -->



<!-- ---------- -- START on change a Customer get the District that belongs to their Customer ------ -------------- -->
<script>
    $(document).ready(function () {
        $('select[name="customer_id"]').on('change', function () {
            var customer_id = $(this).val();
            if (customer_id) {
                $.ajax({
                    url: "{{ URL::to('Get_district_s') }}/" + customer_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
						 $('#district_id').val(data.district_id);
						$('#district_name').val(data.district_name); // Assuming the town_name is returned along with the town ID
                        
                    },
                    error: function (xhr, status, error) {
                       // console.log(error);
                       console.log("XHR Status: " + status);
                        console.log("Error: " + error);
                        console.log(xhr.responseText);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<!-- ---------- -- END on change a Customer get the District that belongs to their Customer ------ -------------- -->








<!-- ---------- -- START GET TANNOURINE PRICE_LIRA ----------- -------------- -->
<script>
    $(document).ready(function () {
        $('select[name="tannourine"]').on('change', function () {
            var tannourine = $(this).val();
            if (tannourine) {
                $.ajax({
                    url: "{{ URL::to('Get_tannourine_price_Lira') }}/" + tannourine,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#tann_price_Lira').val(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<!-- ---------- -- END GET TANNOURINE PRICE_LIRA ----------- -------------- -->




<!-- ---------- -- START GET TANNOURINE PRICE_DOLLAR ----------- -------------- -->
<script>
    $(document).ready(function () {
        $('select[name="tannourine"]').on('change', function () {
            var tannourine = $(this).val();
            if (tannourine) {
                $.ajax({
                    url: "{{ URL::to('Get_tannourine_price_Dollar') }}/" + tannourine,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#tann_price_Dollar').val(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<!-- ---------- -- END GET TANNOURINE PRICE_DOLLAR ----------- -------------- -->







<!-- ---------- -- START GET SEREPTA PRICE_LIRA ----------- -------------- -->
<script>
    $(document).ready(function () {
        $('select[name="serepta"]').on('change', function () {
            var serepta = $(this).val();
            if (serepta) {
                $.ajax({
                    url: "{{ URL::to('Get_Serepta_price_Lira') }}/" + serepta,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#serep_price_Lira').val(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<!-- ---------- -- END GET SEREPTA PRICE_LIRA ----------- -------------- -->



<!-- ---------- -- START GET SEREPTA PRICE_DOLLAR ----------- -------------- -->
<script>
    $(document).ready(function () {
        $('select[name="serepta"]').on('change', function () {
            var serepta = $(this).val();
            if (serepta) {
                $.ajax({
                    url: "{{ URL::to('Get_Serepta_price_Dollar') }}/" + serepta,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#serep_price_Dollar').val(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<!-- ---------- -- END GET SEREPTA PRICE_DOLLAR ----------- -------------- -->