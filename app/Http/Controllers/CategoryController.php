<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $image = $request->image->getClientOriginalName();
        $path = $request->image->storeAs('public/categories',$image);
        $i=1;
        Category::create([
            'id'=>$i++,
            'name'=>$request->name,
            'image'=>$path,
        ]);
        return redirect()->route('categories.index')->with('success','categories added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if ($request->has('image')) {
           $path = $request->image->store('public/categories');
        }else{
            $path = $category->image;
        }
        // $category->update([
        //     'name'=>$request->name,
        //     'image'=>$path
        // ]);
        // Category::where('id',$category->id)->update([
        //     'name'=>$request->name,
        //     'image'=>$path
        // ]);
        DB::table('categories')->where('id',$category->id)->update([
            'name'=>$request->name,
            'image'=>$path
        ]);
        return redirect()->route('categories.index')->with('success','categories updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','categories deleted successfully');
    }
}
