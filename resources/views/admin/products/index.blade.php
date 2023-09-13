@extends('admin.master')

@section('title' , 'Products | ' .env('APP_NAME') )

@section('content')

  <!-- Page Heading -->

    <div class="d-flex justify-content-between mb-3 align-items-center">
        <h1>ALL Products</h1>
        <a class="btn btn-primary px-5" href="{{route('admin.products.create')}}"> <i class="fas fa-plus"></i> Add New Product </a>
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
            <input type="text" class="form-control" name="search" placeholder="Search About Anything ..." value="{{ request()->search}}" >
            <button class="btn btn-success px-5 " type="submit" id="button-addon2"> <i class="fas fa-search"></i> Button</button>
          </div>
    </form>

  <table class="table table-hover table-bordered table-striped">
    <tr>
        <th>id</th>
        <th>Name_EN</th>
        {{-- <th>Name_AR</th> --}}
        <th>Image</th>
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
            <td>{{$product-> $name }}</td>
            {{-- <td>{{$product->name_ar}}</td> --}}
            <td><img width="100" src="{{asset('uploads/'.$product->image)}}"></td>
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
        <td colspan="6" style="text-align: center">No Data Aviable</td>
    </tr>
    @endforelse

  </table>

  {{$products->links()}}
@endsection
