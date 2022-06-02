@extends('layouts.brsAdminApp')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/brsforecasting-style.css')}}"> 

@endpush
@section('content')

<section class="forecasting">
    <div class="row">
        <div class="col-md-12"> 
            <div class="forecasting-head d-flex">                    
                <h3>Forecasting</h3>
            </div>
        </div>
    </div>
</section>
@endsection