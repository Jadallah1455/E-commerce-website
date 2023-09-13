<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest('id')->paginate(10);
        return view('admin.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('admin.categories.creat' , compact('category'));
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
        ]);

        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'),$img_name);

        Category::create([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'image'=>$img_name,
        ]);

        return redirect()->route('admin.categories.index')->with('msg' , 'category Added Successfully')->with('type' , 'success');

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
        $category = Category::findorfail($id);

        return view('admin.categories.edit' , compact('category'));
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
        ]);

        $category = Category::findorfail($id);
        $img_name = $category->image;

        if($request->hasFile('image')){
            File::delete(public_path('uploads/'. $category->image));
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'),$img_name);
        }



        $category->update([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'image'=>$img_name,
        ]);

        return redirect()->route('admin.categories.index')->with('msg' , 'category Updated Successfully')->with('type' , 'info');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findorfail($id);
        File::delete(public_path('uploads/'.$category->image));
        $category->delete();
        return redirect()->route('admin.categories.index')->with('msg' , 'category Deleted Successfully')->with('type' , 'danger');


    }
}
