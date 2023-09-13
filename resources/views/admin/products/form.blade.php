
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label >English Name </label>
            <input type="text" name="name_en" placeholder="English Name" class="form-control @error('name_en') is-invalid @enderror" value="{{old('name_en' , $product->name_en )}}">
            @error('name_en')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label >Arabic Name </label>
            <input type="text" name="name_ar" placeholder="Arabic Name" class="form-control @error('name_ar') is-invalid @enderror" value="{{old('name_ar' , $product->name_ar)}}">
            @error('name_ar')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label >Image</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <small class="invalid-feedback">{{$message}}</small>
            @enderror
            <img width="100" src="{{asset('uploads/'.$product->image)}}">
        </div>
    </div>

</div>
