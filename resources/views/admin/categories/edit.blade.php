@extends('admin.master')

@section('title' , 'Edit Category | ' .env('APP_NAME') )

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
  <h1 class="h3 mb-4 text-gray-800">{{__('category.edit_category')}}</h1>

  <form action="{{route('admin.categories.update' , $category->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('put')

        @include('admin.categories.form')
    <button class="btn btn-success px-5">{{__('category.update')}}</button>
  </form>


@endsection
