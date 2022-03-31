@extends('layouts.brsApp')
@include('brsHeader');

@push('styles')
<link rel="stylesheet" href="{{asset('css/brslandingpage-style.css')}}"> 
@endpush

@section('content')

@endsection

<img src="{{ asset('images/logo2.png') }}" alt="">
