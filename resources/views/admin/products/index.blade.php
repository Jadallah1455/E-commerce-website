@extends('admin.master')

@section('title' , 'Products | ' .env('APP_NAME') )


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

    <div class="d-flex justify-content-between mb-3 align-items-center">
        <h1>{{__('product.all_products')}}</h1>
        <a class="btn btn-primary px-5" href="{{route('admin.products.create')}}"> <i class="fas fa-plus"></i> {{__('product.add_new_product')}} </a>
    </div>

    @if (session('msg'))
    <div class="alert alert-{{session('type')}} alert-dismissible fade show">
        {{session('msg')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{--  البحث الرابط بكون نفس رابط الصفحة والميثود بتكون نفس ميثود الصفحة --}}
    <form action="{{route('admin.products.index')}}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="{{__('product.search_about')}}" value="{{ request()->search}}" >
            <button class="btn btn-success px-5 " type="submit" id="button-addon2"> <i class="fas fa-search"></i> {{__('product.search')}} </button>
          </div>
    </form>

    {{-- price	sale_price	quantity	category_id --}}
  <table class="table table-hover table-bordered table-striped">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Sale Price</th>
        <th>Quantity</th>
        <th>Category Id</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Actions</th>
    </tr>
    @forelse ( $products as $product)
    @php
        $name = 'name_'.app()->currentLocale();
    @endphp
        <tr>
            <td>{{$product->id}}</td>
            {{-- <td>{{$product->{'name_'.app()->currentLocale()} }}</td> --}}
            <td>{{$product->$name }}</td>

            {{-- <td>{{$product->name_ar}}</td> --}}
            <td><img width="100" src="{{asset('uploads/'.$product->image)}}"></td>
            <td>{{$product->price }}</td>
            <td>{{$product->sale_price }}</td>
            <td>{{$product->quantity }}</td>
            <td>{{$product->category->$name }}</td>
            <td>{{$product->created_at->format('d/m/y')}}</td>
            <td>{{$product->updated_at->diffForhumans();}}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{route('admin.products.edit' , $product->id )}}"><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{route('admin.products.destroy' , $product->id )}}" method="POST">
                    @method('delete') @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                </form>
            </td>

        </tr>
    @empty

    <tr>
        <td colspan="10" style="text-align: center">No Data Aviable</td>
    </tr>
    @endforelse

  </table>

  {{$products->links()}}
@endsection
