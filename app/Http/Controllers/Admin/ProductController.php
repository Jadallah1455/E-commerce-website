<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest('id')->paginate(10);
        return view('admin.products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::all();
        return view('admin.products.creat' , compact('product' , 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg',
            'content_en'=>'required',
            'content_ar'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
        ]);

        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'),$img_name);

        Product::create([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'image'=>$img_name,
            'content_en'=>$request->content_en,
            'content_ar'=>$request->content_ar,
            'price'=>$request->price,
            'sale_price'=>$request->sale_price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id,
        ]);

        return redirect()->route('admin.products.index')->with('msg' , 'product Added Successfully')->with('type' , 'success');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findorfail($id);
        $categories = Category::all();
        return view('admin.products.edit' , compact('product' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'image'=>'nullable|image|mimes:jpg,png,jpeg',
            'content_en'=>'required',
            'content_ar'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
        ]);

        $product = Product::findorfail($id);
        $img_name = $product->image;

        if($request->hasFile('image')){
            File::delete(public_path('uploads/'. $product->image));
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'),$img_name);
        }


        $product->update([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'image'=>$img_name,
            'content_en'=>$request->content_en,
            'content_ar'=>$request->content_ar,
            'price'=>$request->price,
            'sale_price'=>$request->sale_price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id,
        ]);

        return redirect()->route('admin.products.index')->with('msg' , 'product Updated Successfully')->with('type' , 'info');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findorfail($id);
        File::delete(public_path('uploads/'.$product->image));
        $product->delete();
        return redirect()->route('admin.products.index')->with('msg' , 'product Deleted Successfully')->with('type' , 'danger');


    }
}
