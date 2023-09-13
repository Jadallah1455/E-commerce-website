@extends('admin.master')

@section('title' , 'Dashboard | ' .env('APP_NAME') )

@section('content')

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

@endsection

{{-- jad --}}
@section('styles')

@if(app()->currentLocale() == 'ar')

   <style>
    body {
        direction: rtl;
        text-align: right;
    }

    .sidebar{

        padding: 0
    }

    .sidebar .nav-item .nav-link{

        text-align: right
    }

    .sidebar .nav-item .nav-link[data-toggle=collapse]::after {
        float: left;
        transform: rotate(180deg)
    }

    .ml-auto, .mx-auto {
    margin-left: 0!important;
    margin-right: auto!important;
    }
</style>
@endif

@endsection
