
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label >{{__('admin.english_name')}} </label>
            <input type="text" name="name_en" placeholder="{{__('admin.english_name')}}" class="form-control @error('name_en') is-invalid @enderror" value="{{old('name_en' , $product->name_en )}}">
            @error('name_en')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label >{{__('admin.arabic_name')}} </label>
            <input type="text" name="name_ar" placeholder="{{__('admin.arabic_name')}}" class="form-control @error('name_ar') is-invalid @enderror" value="{{old('name_ar' , $product->name_ar)}}">
            @error('name_ar')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="mb-3">
            <label >{{__('product.english_content')}} </label>
            <textarea class="form-control @error('content_en') is-invalid @enderror" name="content_en"  rows="5" placeholder="{{__('product.english_content')}}">{{old('content_en' , $product->content_en )}}</textarea>
            @error('content_en')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label >{{__('product.arabic_content')}} </label>
            <textarea class="form-control @error('content_ar') is-invalid @enderror" name="content_ar"  rows="5" placeholder="{{__('product.arabic_content')}}">{{old('content_ar' , $product->content_ar )}}</textarea>
            @error('content_ar')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label >{{__('product.price')}} </label>
            <input type="number" name="price" placeholder="{{__('product.price')}}" class="form-control @error('price') is-invalid @enderror" value="{{old('price' , $product->price )}}">
            @error('price')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3">
            <label >{{__('product.sale_price')}} </label>
            <input type="number" name="sale_price" placeholder="{{__('product.sale_price')}}" class="form-control @error('sale_price') is-invalid @enderror" value="{{old('sale_price' , $product->sale_price)}}">
            @error('sale_price')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label >{{__('product.quantity')}} </label>
            <input type="number" name="quantity" placeholder="{{__('product.quantity')}}" class="form-control @error('quantity') is-invalid @enderror" value="{{old('quantity' , $product->quantity )}}">
            @error('quantity')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>

    @php
        $name = 'name_'.app()->currentLocale();
    @endphp

    <div class="col-md-3">
        <div class="mb-3">
            <label >{{__('product.category_id')}} </label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option  value="">Select Category</option>
                @foreach ($categories as $category)
                    <option {{ $product->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->$name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label >{{__('admin.image')}}</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
            <img width="100" src="{{asset('uploads/'.$product->image)}}">
        </div>
    </div>

</div>
