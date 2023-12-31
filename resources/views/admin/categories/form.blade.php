
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label >{{__('admin.english_name')}}</label>
            <input type="text" name="name_en" placeholder="{{__('admin.english_name')}}" class="form-control @error('name_en') is-invalid @enderror" value="{{old('name_en' , $category->name_en )}}">
            @error('name_en')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label >{{__('admin.arabic_name')}}</label>
            <input type="text" name="name_ar" placeholder="{{__('admin.arabic_name')}}" class="form-control @error('name_ar') is-invalid @enderror" value="{{old('name_ar' , $category->name_ar)}}">
            @error('name_ar')
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
            <img width="100" src="{{asset('uploads/'.$category->image)}}">
        </div>
    </div>

</div>
