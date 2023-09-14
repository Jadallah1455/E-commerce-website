@extends('admin.master')

@section('title' , 'Add New Product | ' .env('APP_NAME') )

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

@section('content')


  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">{{__('product.add_new_product')}}</h1>

  <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

        @include('admin.products.form')

    <button class="btn btn-success px-5">{{__('admin.add_new')}}</button>
  </form>


@endsection
