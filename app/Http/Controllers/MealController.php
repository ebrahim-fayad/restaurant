<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meals = Meal::all();
        return view('meals.index',compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $categories = Category::all();
        return view('meals.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->image->store('public/meals');
        Meal::create([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'image'=>$path,
            's_price'=>$request->s_price,
            'm_price'=>$request->m_price,
            'l_price'=>$request->l_price,
            'description'=>$request->description,
        ]);
        return redirect()->route('meals.index')->with('success','meal added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        $meal->delete();
        return redirect()->route('meals.index')->with('success','meal deleted successfully');
    }
    public function trashed()
    {
        $meals = Meal::onlyTrashed()->get();
        return view('meals.trashed',compact('meals'));
    }
    public function restore($id)
    {
        $meal = Meal::withTrashed()->where('id',$id);
        $meal->restore();
        return redirect()->route('meals.index')->with('success','meal restored successfully');
    }
    public function hardDelete($id)
    {
        $meal = Meal::withTrashed()->where('id',$id);
        $meal->forceDelete();
        return redirect()->route('meals.index')->with('success','meal hardDeleted successfully');
    }
}
