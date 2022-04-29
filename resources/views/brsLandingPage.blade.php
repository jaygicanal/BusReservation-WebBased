@extends('layouts.brsApp')
@include('brsHeader');

@push('styles')
<link rel="stylesheet" href="{{asset('css/brslandingpage-style.css')}}">   
<script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script> 

<!-- <script>
            
var myfrm_handlers = {
    /* fill_provinces:  function(){
        var region_code = $(this).val();
        $('#frm-').ph_locations('fetch_list', [{"region_code": region_code}]);
    }, */

    /* fill_cities: function(){
        var province_code = $(this).val();
        $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
    }, */

    fill_barangays: function(){
        var city_code = $(this).val();
        $('#frm-brgy-dd').ph_locations('fetch_list', [{"city_code": city_code}]);
    }
};
$(document).ready(function(){
    $('#region').on('change', myfrm_handlers.fill_provinces);
    $('#frm-prov-dd').on('change', myfrm_handlers.fill_cities);
    $('#frm-city-dd').on('change', myfrm_handlers.fill_barangays);

    /* $('#region').ph_locations({'location_type': 'regions'}); */
    $('#frm-prov-dd').ph_locations({'location_type': 'provinces'});
    $('#frm-city-dd').ph_locations({'location_type': 'cities'});
    $('#frm-brgy-dd').ph_locations({'location_type': 'barangays'});

    $('#frm-city-dd').ph_locations('fetch_list', [{"province_code": '0562'}]);
});

</script>


<script>
            
var my_handlers = {
    /* fill_provinces:  function(){
        var region_code = $(this).val();
        $('#frm-').ph_locations('fetch_list', [{"region_code": region_code}]);
    }, */

    /* fill_cities: function(){
        var province_code = $(this).val();
        $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
    }, */

    fill_barangays: function(){
        var city_code = $(this).val();
        $('#to-brgy-dd').ph_locations('fetch_list', [{"city_code": city_code}]);
    }
};
$(document).ready(function(){
    $('#region').on('change', my_handlers.fill_provinces);
    $('#to-prov-dd').on('change', my_handlers.fill_cities);
    $('#to-city-dd').on('change', my_handlers.fill_barangays);

    /* $('#region').ph_locations({'location_type': 'regions'}); */
    $('#to-prov-dd').ph_locations({'location_type': 'provinces'});
    $('#to-city-dd').ph_locations({'location_type': 'cities'});
    $('#to-brgy-dd').ph_locations({'location_type': 'barangays'});

    $('#to-city-dd').ph_locations('fetch_list', [{"province_code": '0562'}]);
});
</script> -->

@endpush

@section('content')
<section class="find-bus-section" >
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-7 inner-content">
                <div class="head-content">
                    <div class="h3">Book a Ride Now!</div>
                </div>
                <div class="form-content d-flex justify-content-center ">
                    <div class="row form-reserve">
                        <div class="input-form col-6">
                            <div class="row from d-flex justify-content-end">
                                <div class="icon">
                                    <i class="fa fa-dot-circle-o " aria-hidden="true"></i>
                                </div>
                                <select class="from-city from-city-sm " onblur="this.size=1;"  aria-label=".form-select-lg example" id="frm-city-dd"></select>
                                <select class="from-option from-option-sm " onblur="this.size=1;" aria-label=".form-select-lg example" id="frm-opt-dd"></select>
                                <select class="from-barangay from-barangay-sm " onblur="this.size=1;" aria-label=".form-select-lg example" id="frm-brgy-dd"></select>
                            </div>
                        </div>
                        <div class="input-form col-6 ">
                            <div class="row to d-flex justify-content-end">
                                <div class="icon">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <select class="to-city to-city-sm " onblur="this.size=1;"  aria-label=".form-select-lg example" id="to-city-dd"></select>
                                <select class="to-option to-option-sm " onblur="this.size=1;" aria-label=".form-select-lg example" id="to-opt-dd"></select>
                                <select class="to-barangay to-barangay-sm" onblur="this.size=1;" id="to-brgy-dd"></select>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="col-8 input-form d-flex justify-content-center">
                                <div class="icon">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>    
                                <input type="date" id="date" name="date" placeholder="Date" required/>
                            </div>
                            <!-- <div class="space-margin"></div> -->
                            <div class="col-4 input-form d-flex">
                                <div class="icon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>    
                                <input type="number" id="tp-id" name="tp" placeholder="0" min="1" oninput="validity.valid||(value='');" required/>
                            </div>
                        </div>
                        <div class="form-nav d-flex justify-content-center">
                            <button ><a href="{{ url('available-bus') }}">Find A Bus</a></button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</section>

@endsection



